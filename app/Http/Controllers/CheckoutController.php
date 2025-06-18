<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $globalCart = Session::get('cart', []);
        $globalCartTotal = collect($globalCart)->sum(fn($item) => $item['price'] * $item['qty']);
        return view('checkout.index', compact('globalCart', 'globalCartTotal'));
    }

    public function process(Request $request)
    {
        try {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }
        
        $domainId = env('DOMAIN_ID', 1);
        
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'domains' => $domainId,
        ]);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);
        $total = $subtotal;

        $order = Order::create([
            'customer_id' => $customer->id,
            'subtotal' => $subtotal,
            'total' => $total,
            'domains' => $domainId,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['qty'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('order.success')->with('message', [
            'type' => 'success',
            'text' => '✅ Your order has been placed successfully!',
        ]);
    }
    catch (\Exception $e) {
        Log::error($e->getMessage());

        return redirect()->route('order.success')->with('message', [
            'type' => 'error',
            'text' => '❌ Something went wrong. Please try again later.',
        ]);
    }
}
}
