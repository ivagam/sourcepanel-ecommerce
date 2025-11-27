<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalController extends Controller
{
    public function index(Request $request)
    {          
        return view('cal');
    }
}