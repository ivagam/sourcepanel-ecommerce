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
        $product = Product::with('images', 'category') // Load category as well
            ->where('product_url', $slug)
            ->firstOrFail();

        $variants = Product::with('images')
            ->where('product_url', $slug)
            ->orderBy('size')
            ->get();

        // Fetch related products from the same category
        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id) // same category
            ->where('product_id', '!=', $product->product_id) // exclude current product
            ->take(10) // limit to 10 related products
            ->get();

        return view('product.product', compact('product', 'variants', 'relatedProducts'));
    }

}
