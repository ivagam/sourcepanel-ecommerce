<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MsgController extends Controller
{
    private string $apiBaseUrl = 'https://api.sourcepanel.xyz/';

    public function index()
    {
        $response = Http::get($this->apiBaseUrl . 'msg');

        if (!$response->successful()) {
            return view('msg', ['msg' => collect()]);
        }

        $data = $response->json();

        $msg = collect($data)->map(fn ($item) => (object) $item);

        return view('msg', compact('msg'));
    }
}

    ?>