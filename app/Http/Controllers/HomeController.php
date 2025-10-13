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
        $isLoggedIn = session('frontend') == 'yes' ? true : false;

        $initialLimit = 12;
        $categoryId = $request->query('category');

         $productBaseQuery = Product::query()
                ->where('is_delete', '!=', 1)
                ->where('status', 1);

        if ($categoryId) {
            if (is_numeric($categoryId)) {
                $matchingCategoryIds = Category::whereRaw("FIND_IN_SET(?, category_ids)", [$categoryId])
                    ->pluck('category_id')
                    ->toArray();

                $matchingCategoryIds[] = $categoryId;
            } else {
                $matchingCategoryIds = Category::whereRaw(
                    'LOWER(category_name) LIKE ?',
                    ['%' . strtolower($categoryId) . '%']
                )->pluck('category_id')->toArray();
            }

            if (!empty($matchingCategoryIds)) {
                $productBaseQuery->whereIn('category_id', $matchingCategoryIds);
            } else {
                $productBaseQuery->whereRaw('0 = 1');
            }
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
       

        $brands = Brand::all();
        $banners = Banner::all();

        return view('index', compact('products', 'brands', 'banners', 'totalProducts', 'isLoggedIn'));
    }


    public function gallery(Request $request)
    {
        $initialLimit = 12;
        $categoryName = $request->query('category');

        $productBaseQuery = Product::query()
        ->where('is_delete', '!=', 1)
        ->where('status', 1);

        if ($categoryName === 'videos') {
            $productBaseQuery->whereHas('images', function ($q) {
                $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')");
            });

            $products = $productBaseQuery
                ->with(['images' => function ($q) {
                    $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')")
                    ->orderBy('serial_no');
                }, 'category'])
                ->latest()
                ->take($initialLimit)
                ->get();

        } else {
            if ($categoryName) {
                $matchingCategoryIds = Category::where('category_name', 'like', "%$categoryName%")
                    ->pluck('category_id')
                    ->toArray();

                if (!empty($matchingCategoryIds)) {
                    $productBaseQuery->where(function ($query) use ($matchingCategoryIds) {
                        foreach ($matchingCategoryIds as $catId) {
                            $query->orWhere('category_id', $catId)
                                ->orWhereRaw("FIND_IN_SET(?, category_ids)", [$catId]);
                        }
                    });
                } else {
                    $productBaseQuery->whereRaw('0 = 1');
                }
            }

            $subQuery = $productBaseQuery
                ->select(DB::raw('MIN(product_id) as id'))
                ->groupBy('product_url');

            $productIds = $subQuery->pluck('id')->toArray();

            $products = Product::with(['images', 'category'])
                ->whereIn('product_id', $productIds)
                ->latest()
                ->take($initialLimit)
                ->get();
        }

        return view('gallery', compact('products', 'categoryName'));
    }

    public function gallerysearch(Request $request)
    {
        $initialLimit = 12;
        $categoryName = $request->query('category');
        $search = strtolower($request->input('search', ''));

        $productBaseQuery = Product::query()
            ->where('is_delete', '!=', 1)
            ->where('status', 1);

        if ($categoryName === 'videos') {
            $productBaseQuery->whereHas('images', function ($q) {
                $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')");
            });
        }

        if ($categoryName && $categoryName !== 'videos') {
            $matchingCategoryIds = Category::where('category_name', 'like', "%$categoryName%")
                ->pluck('category_id')
                ->toArray();

            if (!empty($matchingCategoryIds)) {
                $productBaseQuery->where(function ($query) use ($matchingCategoryIds) {
                    foreach ($matchingCategoryIds as $catId) {
                        $query->orWhere('category_id', $catId)
                            ->orWhereRaw("FIND_IN_SET(?, category_ids)", [$catId]);
                    }
                });
            } else {
                $productBaseQuery->whereRaw('0 = 1');
            }
        }

        if (!empty($search)) {
            $productBaseQuery->leftJoin('category', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(category.category_id, products.category_ids)"), '>', DB::raw('0'));
            })
            ->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(products.product_name) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(products.description) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(category.category_name) LIKE ?", ['%' . $search . '%']);
            });
        }

        $subQuery = $productBaseQuery
            ->select(DB::raw('MIN(products.product_id) as id'))
            ->groupBy('products.product_url');

        $productIds = $subQuery->pluck('id')->toArray();

        $products = Product::with(['images', 'category'])
            ->whereIn('product_id', $productIds)
            ->latest()
            ->take($initialLimit)
            ->get();

        return view('gallery', compact('products', 'categoryName'));
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 12;
        $categoryName = $request->input('category');
        $search = strtolower($request->input('search', ''));
    
        $productBaseQuery = Product::query()
        ->where('is_delete', '!=', 1)
        ->where('status', 1);

        if (!empty($search)) {
            $productBaseQuery->leftJoin('category', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(category.category_id, products.category_ids)"), '>', DB::raw('0'));
            })
            ->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(products.product_name) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(products.description) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(category.category_name) LIKE ?", ['%' . $search . '%']);
            });

            if ($categoryName && $categoryName !== 'videos') {
                if (is_numeric($categoryName)) {
                    $categoryName = Category::where('category_id', $categoryName)
                        ->value('category_name');
                }

                $matchingCategoryIds = Category::where('category_name', 'like', "%$categoryName%")
                    ->pluck('category_id')
                    ->toArray();

                if (!empty($matchingCategoryIds)) {
                    $productBaseQuery->where(function ($query) use ($matchingCategoryIds) {
                        foreach ($matchingCategoryIds as $catId) {
                            $query->orWhere('products.category_id', $catId) // explicitly specify table
                                ->orWhereRaw("FIND_IN_SET(?, products.category_ids)", [$catId]);
                        }
                    });
                } else {
                    $productBaseQuery->whereRaw('0 = 1');
                }
            }

            $productIds = $productBaseQuery
                ->select(DB::raw('MIN(products.product_id) as id'))
                ->groupBy('products.product_url')
                ->orderBy('id', 'desc')
                ->skip($offset)
                ->take($limit)
                ->pluck('id')
                ->toArray();

            $products = Product::with(['images', 'category'])
                ->whereIn('product_id', $productIds)
                ->latest()
                ->get();
        } elseif ($categoryName === 'videos') {
            $productBaseQuery->whereHas('images', function ($q) {
                $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')");
            });

            $products = $productBaseQuery
                ->with(['images' => function ($q) {
                    $q->whereRaw("LOWER(SUBSTRING_INDEX(file_path, '.', -1)) IN ('mp4','webm','mov','avi')")
                    ->orderBy('serial_no');
                }, 'category'])
                ->latest()
                ->skip($offset)
                ->take($limit)
                ->get();

        } else {
            if ($categoryName) {

                $matchingCategoryIds = Category::where('category_name', 'like', "%$categoryName%")
                    ->pluck('category_id')
                    ->toArray();

                if (!empty($matchingCategoryIds)) {
                    $productBaseQuery->where(function ($query) use ($matchingCategoryIds) {
                        foreach ($matchingCategoryIds as $catId) {
                            $query->orWhere('category_id', $catId)
                                ->orWhereRaw("FIND_IN_SET(?, category_ids)", [$catId]);
                        }
                    });
                } else {
                    $productBaseQuery->whereRaw('0 = 1');
                }
            }

            $subQuery = $productBaseQuery
                ->select(DB::raw('MIN(product_id) as id'))
                ->groupBy('product_url');

            $productIds = $subQuery->pluck('id')->toArray();

            $products = Product::with(['images', 'category'])
                ->whereIn('product_id', $productIds)
                ->latest()
                ->skip($offset)
                ->take($limit)
                ->get();
        }

        return response()->json($products);
    }

   public function livesearch(Request $request)
    {
        $isLoggedIn = session('frontend') == 'yes';
        $initialLimit = 12;

        $search = strtolower($request->input('search', ''));
        $categoryId = $request->input('category');

        $productBaseQuery = Product::query()
            ->where('is_delete', '!=', 1)
            ->where('status', 1);

        if (!empty($search)) {
            $productBaseQuery->leftJoin('category', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(category.category_id, products.category_ids)"), '>', DB::raw('0'));
            })
            ->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(products.product_name) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(products.description) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(products.sku) LIKE ?", ['%' . $search . '%'])
                ->orWhereRaw("LOWER(category.category_name) LIKE ?", ['%' . $search . '%']);
            });
        }

        if (!empty($categoryId)) {
            $productBaseQuery->whereRaw("FIND_IN_SET(?, products.category_ids)", [$categoryId]);
        }

        $subQuery = $productBaseQuery
            ->select(DB::raw('MIN(products.product_id) as id'))
            ->groupBy('products.product_url');

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

        return view('index', compact(
            'products',
            'categories',
            'brands',
            'banners',
            'totalProducts',
            'isLoggedIn'
        ));
    }
    
    public function documentation()
    {
        return view('documentation');
    }

    public function cal(Request $request)
    {          
        return view('cal');
    }

    public function msg(Request $request)
    {  
        $msg = Whatsapp::all();
        return view('msg', compact('msg'));
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
