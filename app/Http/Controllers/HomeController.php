<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

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
        $isLoggedIn = session('frontend') == 'yes' ? true : false;

        $initialLimit = 12;
        $categoryId = $request->query('category');

        $productBaseQuery = Product::query();

        if ($categoryId) {
            $matchingCategoryIds = Category::whereRaw("FIND_IN_SET(?, category_ids)", [$categoryId])
                ->pluck('category_id')
                ->toArray();

            $matchingCategoryIds[] = $categoryId;

            $productBaseQuery->whereIn('category_id', $matchingCategoryIds);
        }

        $subQuery = $productBaseQuery
            ->select(DB::raw('MIN(product_id) as id'))
            ->groupBy('product_url');

        $totalProducts = $subQuery->get()->count();

        $productIds = $subQuery->pluck('id')->toArray();

        $products = Product::with(['images', 'category'])
            ->whereIn('product_id', $productIds)
            ->latest()
            ->take($initialLimit)
            ->get();

        $categories = Category::with('children')
            ->whereNull('subcategory_id')
            ->get();

        $brands = Brand::all();
        $banners = Banner::all();

        return view('index', compact('products', 'categories', 'brands', 'banners', 'totalProducts', 'isLoggedIn'));
    }

    public function gallery(Request $request)
    {
        $isLoggedIn = session('frontend') == 'yes' ? true : false;

        $initialLimit = 12;
        $categoryId = $request->query('category');

        $productBaseQuery = Product::query();

        if ($categoryId) {
            $matchingCategoryIds = Category::whereRaw("FIND_IN_SET(?, category_ids)", [$categoryId])
                ->pluck('category_id')
                ->toArray();

            $matchingCategoryIds[] = $categoryId;

            $productBaseQuery->whereIn('category_id', $matchingCategoryIds);
        }

        $subQuery = $productBaseQuery
            ->select(DB::raw('MIN(product_id) as id'))
            ->groupBy('product_url');

        $totalProducts = $subQuery->get()->count();

        $productIds = $subQuery->pluck('id')->toArray();

        $products = Product::with(['images', 'category'])
            ->whereIn('product_id', $productIds)
            ->latest()
            ->take($initialLimit)
            ->get();

        $categories = Category::with('children')
            ->whereNull('subcategory_id')
            ->get();

        $brands = Brand::all();
        $banners = Banner::all();

        return view('gallery', compact('products', 'categories', 'brands', 'banners', 'totalProducts', 'isLoggedIn'));
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
        $search = strtolower($request->input('q'));

        if (!$search) {
            return response()->json([]);
        }

        $query = Product::leftJoin('category', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(category.category_id, products.category_ids)"), '>', DB::raw('0'));
        })
        ->select('products.*', 'category.category_name')
        ->where(function ($q) use ($search) {
            $q->whereRaw("MATCH(products.product_name, products.description) AGAINST(? IN BOOLEAN MODE)", [$search])
            ->orWhereRaw("LOWER(category.category_name) LIKE ?", ['%' . $search . '%'])
            ->orWhereRaw("LOWER(products.sku) LIKE ?", ['%' . $search . '%']);
        });

        $products = $query->whereNotNull('product_url')
            ->where('product_url', '!=', '')
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return [
                    'name' => $product->product_name,
                    'url' => url('/product/' . $product->product_url),
                    'type' => 'Product',
                ];
            });

        return response()->json($products);
    }


}
