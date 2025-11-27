<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(Request $request)
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

}