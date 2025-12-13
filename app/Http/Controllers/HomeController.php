<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Admin;
use App\Models\Whatsapp;
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
        $isLoggedIn = session('frontend') == 'yes';

        $initialLimit = 12;

        $slug = request()->path();

        if ($slug === "") {
            $slug = "/";
        }
        $seo = config("seo_master.$slug") ?? null;

        $searchQuery = $request->category ?? $request->query('category');

        $productBaseQuery = Product::query()
            ->where('is_delete', '!=', 1)
            ->where('status', 1);

        if ($searchQuery) {

            $searchQuery = str_replace('-', ' ', trim($searchQuery));
            
            $keywords = explode(' ', strtolower($searchQuery));

            $matchingCategoryIds = Category::where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhereRaw("LOWER(category_name) LIKE ?", ["%{$word}%"]);
                }
            })->pluck('category_id')->toArray();

            $matchingProductIds = Product::where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhereRaw("LOWER(product_name) LIKE ?", ["%{$word}%"]);
                }
            })->pluck('product_id')->toArray();

            $matchingBrandIds = Brand::where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhereRaw("LOWER(brand_name) LIKE ?", ["%{$word}%"]);
                }
            })->pluck('brand_id')->toArray();

            if (!empty($matchingCategoryIds) || !empty($matchingBrandIds) || !empty($matchingProductIds)) {
                $productBaseQuery->where(function ($query) use ($matchingCategoryIds, $matchingBrandIds, $matchingProductIds) {
                    if (!empty($matchingCategoryIds)) {
                        $query->orWhereIn('category_id', $matchingCategoryIds);
                    }
                    if (!empty($matchingBrandIds)) {
                        $query->orWhereIn('brand_id', $matchingBrandIds);
                    }
                    if (!empty($matchingProductIds)) {
                        $query->orWhereIn('product_id', $matchingProductIds);
                    }
                });
            } else {                
                $productBaseQuery->whereRaw("0 = 1");
            }
        }

        // --------- UNIQUE PRODUCT PER URL -----------
        $subQuery = $productBaseQuery
            ->select(DB::raw("MIN(product_id) as id"))
            ->groupBy("product_url");

        $totalProducts = $subQuery->count();
        $productIds = $subQuery->pluck("id");

        $products = Product::with(['images', 'category'])
            ->whereIn("product_id", $productIds)
            ->latest()
            ->take($initialLimit)
            ->get();

        $brands = Brand::all();
        $banners = Banner::all();

        return view('index', compact('products', 'brands', 'banners', 'totalProducts', 'isLoggedIn', 'seo'));
    }  

   public function livesearch(Request $request)
    {
        $isLoggedIn = session('frontend') == 'yes';
        $initialLimit = 12;

        $search = trim(str_replace('-', ' ', strtolower($request->input('search', ''))));
        
        $categoryId = $request->input('category');

        $productBaseQuery = Product::query()
            ->where('is_delete', '!=', 1)
            ->where('status', 1);

        if (!empty($search)) {
            $keywords = preg_split('/\s+/', $search);

            $productBaseQuery->where(function ($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $word = trim($word);
                    if ($word === '') continue;

                    $q->where(function ($inner) use ($word) {
                        $inner->whereRaw("LOWER(product_name) LIKE ?", ["%$word%"])
                            ->orWhereRaw("LOWER(description) LIKE ?", ["%$word%"])
                            ->orWhereRaw("LOWER(sku) LIKE ?", ["%$word%"]);
                    });
                }
            });
        }

        if (!empty($categoryId)) {
            $productBaseQuery->whereRaw("FIND_IN_SET(?, category_ids)", [$categoryId]);
        }

        $subQuery = $productBaseQuery
            ->select(DB::raw('MIN(product_id) as id'))
            ->groupBy('product_url');

        $totalProducts = $subQuery->count();
        $productIds = $subQuery->pluck('id')->toArray();

        $products = Product::with(['images', 'category'])
            ->whereIn('product_id', $productIds)
            ->latest()
            ->take($initialLimit)
            ->get();

        return view('index', compact(
            'products',
            'totalProducts',
            'isLoggedIn'
        ));
    }
    
   public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 12;

        $categoryName = $request->input('category', '');
        $categoryName = urldecode($categoryName);
        $categoryName = str_replace( '-', ' ', $categoryName);
        
        $isNumericCategory = is_numeric($categoryName);

        $search = strtolower($request->input('search', ''));
        $search = str_replace('+', ' ', urldecode($search));

        $query = Product::query()
            ->where('is_delete', '!=', 1)
            ->where('status', 1);

        // Apply search filter
        if (!empty($search)) {            
            $query->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(product_name) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(description) LIKE ?", ['%' . $search . '%'])
                ->orWhereHas('category', function ($qc) use ($search) {
                    $qc->whereRaw("LOWER(category_name) LIKE ?", ['%' . $search . '%']);
                });
            });
        }

        // Apply category filter
        if ($categoryName && $categoryName !== 'videos') {            
            $matchingCategoryIds = [];
            if ($isNumericCategory) {
                $matchingCategoryIds = [$categoryName];
            } else {
                $matchingCategoryIds = Category::where('category_name', 'like', "%$categoryName%")
                    ->pluck('category_id')
                    ->toArray();
            }

            if (!empty($matchingCategoryIds)) {
                $query->where(function ($q) use ($matchingCategoryIds) {
                    foreach ($matchingCategoryIds as $catId) {
                        $q->orWhere('category_id', $catId)
                        ->orWhereRaw("FIND_IN_SET(?, category_ids)", [$catId]);
                    }
                });
            } else {
                $query->whereRaw('0 = 1'); // No matching category
            }
        }

        // Apply video filter
        if ($categoryName === 'videos') {
            $query->whereHas('images', function ($q) {
                $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')");
            });
        }

        // Get distinct products
        $productIds = $query
            ->select(DB::raw('MIN(product_id) as id'))
            ->groupBy('product_url')
            ->orderBy('id', 'desc')
            ->skip($offset)
            ->take($limit)
            ->pluck('id')
            ->toArray();

        $products = Product::with(['images', 'category'])
            ->whereIn('product_id', $productIds)
            ->latest()
            ->get();

        return response()->json($products);
    }

    
    public function documentation()
    {
        return view('documentation');
    }

     public function aboutus()
    {
        return view('about-us');
    }

     public function contactus()
    {
        return view('contact-us');
    }
}
