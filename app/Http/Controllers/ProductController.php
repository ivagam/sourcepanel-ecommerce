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
        $product = Product::with('images')
                ->where('product_url', $slug)
                ->firstOrFail();
        return view('product.product', compact('product'));
    }

}
