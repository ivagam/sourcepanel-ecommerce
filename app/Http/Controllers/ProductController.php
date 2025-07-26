<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function quickView($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return view('ajax.product-quick-view', compact('product'));
    }

     public function show($slug)
    {        
        
        $product = Product::with('images', 'category')
            ->where('product_url', $slug)
            ->firstOrFail();            

       
        $variants = Product::with('images')
            ->where('product_url', $slug)
            ->orderBy('size')
            ->get();

        if (!empty($product->sku)) {
            $relatedProducts = Product::with('images', 'category')
                ->where('sku', $product->sku)
                ->where('product_id', '!=', $product->product_id)
                ->take(10)
                ->get();
        } else {
            $relatedProducts = collect(); // return empty collection
        }

        $prevProduct = Product::with('images')
            ->where('product_id', '<', $product->product_id)
            ->orderBy('product_id', 'desc')
            ->first();

        $nextProduct = Product::with('images')
            ->where('product_id', '>', $product->product_id)
            ->orderBy('product_id', 'asc')
            ->first();

        return view('product.product', compact('product', 'variants', 'relatedProducts', 'prevProduct', 'nextProduct'));
    }

}
