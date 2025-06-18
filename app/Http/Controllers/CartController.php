<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $cart = session('cart', []);

        $id = $request->product_id;
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->quantity;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $request->product_price,
                'file_path' => $request->file_path,
            ];
        }

        session(['cart' => $cart]);

        return response()->json(['success' => 'Product added to cart successfully.']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['success' => 'Product removed from cart']);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return back()->with('error', 'Product not found in cart.');
        }

        // Update quantity based on action
        if ($request->action === 'increase') {
            $cart[$id]['qty'] += 1;
        } elseif ($request->action === 'decrease') {
            $cart[$id]['qty'] -= 1;

            // Optionally remove if quantity is 0
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Cart updated successfully.');
    }

}
