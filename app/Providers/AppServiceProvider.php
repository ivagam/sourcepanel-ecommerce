<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = collect($cart)->sum('qty');
            $cartTotal = collect($cart)->sum(function ($item) {
                return ($item['price'] ?? 0) * ($item['qty'] ?? 0);
            });

            $view->with('globalCart', $cart);
            $view->with('globalCartCount', $cartCount);
            $view->with('globalCartTotal', $cartTotal);

            $domainId = env('DOMAIN_ID', 1);

            $categories = Category::with(['children' => function ($query) use ($domainId) {
                $query->whereRaw('FIND_IN_SET(?, domains)', [$domainId]);
            }])
            ->whereNull('subcategory_id')
            ->whereRaw('FIND_IN_SET(?, domains)', [$domainId])
            ->get();

            foreach ($categories as $category) {
                $category->products_count = Product::where('category_id', $category->category_id)->count();

                foreach ($category->children as $child) {
                    $child->products_count = Product::where('category_id', $child->category_id)->count();
                }
            }

            $view->with('categories', $categories);
        });
    }
}