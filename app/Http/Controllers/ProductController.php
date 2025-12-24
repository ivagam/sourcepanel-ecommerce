<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    private string $apiBaseUrl = 'https://api.sourcepanel.xyz/';

    public function quickView($id)
    {
        $response = Http::get($this->apiBaseUrl . "product/quick-view/{$id}");
        $data = $response->json();

        $product = $this->normalizeProduct((object) $data['product']);

        return view('ajax.product-quick-view', compact('product'));
    }

    public function show($slug)
    {
        $response = Http::get($this->apiBaseUrl . "product/{$slug}");
        $data = $response->json();

        

        $product = $this->normalizeProduct((object) $data['product']);

        $variants = collect($data['variants'])
            ->map(fn ($v) => $this->normalizeProduct((object) $v));

        $relatedProducts = collect($data['relatedProducts'])
            ->map(fn ($r) => $this->normalizeProduct((object) $r));

        $skuProducts = collect($data['skuProducts'])
            ->map(fn ($s) => $this->normalizeProduct((object) $s));

        $prevProduct = $data['prevProduct']
            ? $this->normalizeProduct((object) $data['prevProduct'])
            : null;

        $nextProduct = $data['nextProduct']
            ? $this->normalizeProduct((object) $data['nextProduct'])
            : null;

        return view('product.product', compact(
            'product',
            'variants',
            'relatedProducts',
            'prevProduct',
            'nextProduct',
            'skuProducts'
        ));
    }

    private function normalizeProduct(object $product): object
    {
        $product->images = collect($product->ProductImages ?? [])
            ->map(fn ($img) => (object) $img);

        unset($product->ProductImages);

        $product->title = $product->title
            ?? $product->product_name
            ?? null;

        $product->chinese_description = $product->chinese_description ?? null;

        return $product;
    }
}
