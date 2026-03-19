<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private string $apiBaseUrl = 'https://api.sourcepanel.xyz/';

    public function quickView($id)
    {
        $response = Http::get($this->apiBaseUrl . "product/quick-view/{$id}");
        $data = $response->json();

        $productData = data_get($data, 'product');

        if (!$productData) {
            abort(404);
        }

        $product = $this->normalizeProduct((object) $productData);

        return view('ajax.product-quick-view', compact('product'));
    }

    public function show($slug)
    {
        $seoKey = 'product/' . $slug;
        $seo = config("seo_master.$seoKey") ?? null;

        $response = Http::get($this->apiBaseUrl . "product/{$slug}");
        $data = $response->json();

        $productData = data_get($data, 'product');

        if ($productData) {

            $product = $this->normalizeProduct((object) $productData);

            $variants = collect(data_get($data, 'variants', []))
                ->map(fn ($v) => $this->normalizeProduct((object) $v));

            $relatedProducts = collect(data_get($data, 'relatedProducts', []))
                ->map(fn ($r) => $this->normalizeProduct((object) $r));

            $skuProducts = collect(data_get($data, 'skuProducts', []))
                ->map(fn ($s) => $this->normalizeProduct((object) $s));

            $prevProduct = data_get($data, 'prevProduct')
                ? $this->normalizeProduct((object) data_get($data, 'prevProduct'))
                : null;

            $nextProduct = data_get($data, 'nextProduct')
                ? $this->normalizeProduct((object) data_get($data, 'nextProduct'))
                : null;

        } else {

            $dbProduct = DB::table('products')
                ->where('product_url', 'LIKE', "%{$slug}%")
                ->first();

            if (!$dbProduct) {
                abort(404);
            }

            $product = $this->normalizeProduct((object) $dbProduct);

            $variants = collect();
            $relatedProducts = collect();
            $skuProducts = collect();
            $prevProduct = null;
            $nextProduct = null;
        }

        return view('product.product', compact(
            'product',
            'variants',
            'relatedProducts',
            'prevProduct',
            'nextProduct',
            'skuProducts',
            'seo'
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