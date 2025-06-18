<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $initialLimit = 12;
        $categoryId = $request->query('category');

        $query = Product::with('images')->latest();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->take($initialLimit)->get();

        $categories = Category::with('children')
                    ->whereNull('subcategory_id')
                    ->get();

        $brands = Brand::all();
        $banners = Banner::all();

        return view('index', compact('products', 'categories', 'brands', 'banners'));
    }

    public function documentation()
    {
        return view('documentation');
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $products = Product::with('images')
            ->latest()
            ->skip($offset)
            ->take(12)
            ->get();

        return response()->json($products);
    }
}
