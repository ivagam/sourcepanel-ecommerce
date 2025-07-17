<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Admin;

class HomeController extends Controller
{

    public function login(Request $request)
    {  
        session([
            'frontend' => 'yes',
        ]);
        return redirect()->route('home');
    }

    public function showLoginForm(Request $request)
    {  
        return view('simple-login');
    }
    public function index(Request $request)
    {
        $isLoggedIn = session('frontend') == 'yes'?true:false;
        // your existing product/category/brand queries here...
        $initialLimit = 12;
        $categoryId = $request->query('category');

        $query = Product::with(['images', 'category'])->latest();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $totalProducts = $query->count();
        $products = $query->take($initialLimit)->get();

        $categories = Category::with('children')
                    ->whereNull('subcategory_id')
                    ->get();

        $brands = Brand::all();
        $banners = Banner::all();

        return view('index', compact('products', 'categories', 'brands', 'banners', 'totalProducts', 'isLoggedIn'));
    }

    public function documentation()
    {
        return view('documentation');
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 12;

        $query = Product::with(['images', 'category'])->latest();

        // ✅ Filter by category if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        $products = $query->skip($offset)->take($limit)->get();

        return response()->json($products);
    }

   public function liveSearch(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([]);
        }

        $products = Product::whereRaw('LOWER(product_name) LIKE ?', ['%' . strtolower($query) . '%'])
            ->whereNotNull('product_url')
            ->where('product_url', '!=', '')            
            ->get()
            ->map(fn($p) => [
                'name' => $p->product_name,
                'url' => url('/product/' . $p->product_url),
                'type' => 'Product'
            ]);

        return response()->json($products);
    }

}
