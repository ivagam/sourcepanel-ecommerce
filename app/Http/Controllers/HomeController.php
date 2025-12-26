<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private string $apiBaseUrl = 'https://api.sourcepanel.xyz/';

    public function login(Request $request)
    {
        session(['frontend' => 'yes']);
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('simple-login');
    }

    public function index(Request $request)
    {    
        $category = $request->route('category') ?? $request->query('category');    
        $category = str_replace('-', ' ', $category ?? '');

        $response = Http::get($this->apiBaseUrl, [
            'category' => $category,
        ]);

        $data = $response->json();

        $products = collect($data['products'] ?? [])->map(function ($p) {
            $p = (object) $p;

            $p->images = collect($p->images ?? []);

            return $p;
        });
        
        return view('index', [
            'products'      => $products,
            'totalProducts' => $data['totalProducts'] ?? 0,
            'isLoggedIn'    => session('frontend') === 'yes',
        ]);
    }

    

    public function loadMore(Request $request)
    {
        
        $response = Http::get($this->apiBaseUrl . 'load-more', [
            'offset' => $request->input('offset', 0),
            'category' => $request->input('category', ''),
            'search' => $request->input('search', ''),
        ]);

        $data = $response->json();

        $products = collect($data['products'] ?? [])->map(function ($item) {
            $item['images'] = collect($item['ProductImages'] ?? []);
            unset($item['ProductImages']);
            return (object) $item;
        });

        return response()->json($products);
    }

    public function liveSearch(Request $request)
    {
        $response = Http::get($this->apiBaseUrl . 'live-search', [
            'search' => $request->input('search', ''),
            'category' => $request->input('category', ''),
        ]);

        $data = $response->json();

         $products = collect($data['products'] ?? [])->map(function ($p) {
            $p = (object) $p;
            $p->images = collect($p->images ?? []);
            return $p;
        });

        $categories = collect($data['categories'] ?? [])->map(function ($cat) {
            $cat['children'] = collect($cat['children'] ?? []);
            return (object) $cat;
        });

        return view('index', [
            'products' => $products,
            'categories' => $categories,
            'totalProducts' => $data['totalProducts'] ?? 0,
            'isLoggedIn' => $data['isLoggedIn'] ?? false,
        ]);
    }

     public function aboutus()
    {
        return view('about-us');
    }

     public function contactus()
    {
        return view('contact-us');
    }

     
    public function documentation()
    {
        return view('documentation');
    }

    public function cal(Request $request)
    {          
        return view('cal');
    }

}
