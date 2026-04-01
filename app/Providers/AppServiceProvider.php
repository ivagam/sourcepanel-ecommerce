<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            // ✅ Cart (no DB)
            $cart = session('cart', []);
            $cartCount = collect($cart)->sum('qty');
            $cartTotal = collect($cart)->sum(function ($item) {
                return ($item['price'] ?? 0) * ($item['qty'] ?? 0);
            });

            $view->with('globalCart', $cart);
            $view->with('globalCartCount', $cartCount);
            $view->with('globalCartTotal', $cartTotal);

            // ✅ API call (replace DB)
            $domainId = env('DOMAIN_ID', 1);

            try {
                $response = Http::get(env('SOURCEPANEL_API_BASE_URL'), [
                    'domain_id' => $domainId
                ]);

                $data = $response->json();

                $categories = collect($data['categories'] ?? []);

            } catch (\Exception $e) {
                $categories = collect([]);
            }

            $view->with('categories', $categories);
        });
    }
}