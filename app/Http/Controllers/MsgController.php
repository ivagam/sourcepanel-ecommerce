<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;

class MsgController extends Controller
{

    public function index(Request $request)
    {  
        $msg = Whatsapp::all();
        return view('msg', compact('msg'));
    }
}