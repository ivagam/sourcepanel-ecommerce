<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistIds = session('wishlist', []);

         $products = \App\Models\Product::with('images')
                ->whereIn('product_id', $wishlistIds)
                ->get();

        //print_r($products); exit;

        return view('wishlist.index', compact('products'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;
        //echo $productId; exit;
        $wishlist = session('wishlist', []);

        if (!in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
            session(['wishlist' => $wishlist]);

            return response()->json([
                'success' => 'Product added to wishlist!',
                'wishlist' => $wishlist
            ]);
        }

        return response()->json([
            'error' => 'Product already in wishlist.',
            'wishlist' => $wishlist
        ], 409);
    }

    public function remove(Request $request)
    {
        $productId = $request->product_id;
        $wishlist = session('wishlist', []);

        if (($key = array_search($productId, $wishlist)) !== false) {
            unset($wishlist[$key]);
            session(['wishlist' => $wishlist]);
            return response()->json(['success' => 'Product removed from wishlist!']);
        }

        return response()->json(['error' => 'Product not found in wishlist.'], 404);
    }
}
