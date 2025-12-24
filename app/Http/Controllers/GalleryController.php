<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GalleryController extends Controller
{
    private string $apiBaseUrl = 'https://api.sourcepanel.xyz/';

    public function index(Request $request)
    {
        $categoryName = $request->query('category', '');

        $response = Http::get($this->apiBaseUrl . 'gallery', [
            'category' => $categoryName,
        ]);

        $data = $response->json();

        $products = collect($data['products'] ?? [])->map(function ($item) {
            $item = (object) $item;

            $item->images = collect($item->ProductImages ?? [])
                ->map(fn ($img) => (object) $img);

            unset($item->ProductImages);

            $item->image = $item->images->first();

            return $item;
        });

        return view('gallery', [
            'products'     => $products,
            'categoryName' => $data['categoryName'] ?? $categoryName,
        ]);
    }

    public function gallerysearch(Request $request)
    {
        $categoryName = $request->query('category', '');
        $search       = $request->input('search', '');

        $response = Http::get($this->apiBaseUrl . 'gallerySearch', [
            'category' => $categoryName,
            'search'   => $search,
        ]);

        $data = $response->json();

        $products = collect($data['products'] ?? [])->map(function ($item) {
            $item = (object) $item;

            $item->images = collect($item->ProductImages ?? []);
            unset($item->ProductImages);

            return $item;
        });

        return view('gallery', [
            'products'     => $products,
            'categoryName' => $data['categoryName'] ?? $categoryName,
        ]);
    }
}
