<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        return view('buyer.shop', [
            'products'=>Product::all()
        ]);
    }

    public function history()
    {
        return view('buyer.history', [
            'orders'=>Order::all()
        ]);
    }

    public function showProducts()
    {
        $randomProduct = Product::inRandomOrder()->first();
        $product = Product::inRandomOrder()->take(8)->get();
        return view('buyer.home', compact('randomProduct', 'product'));
    }


    public function cart()
    {
        return view('buyer.cart');
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "product_img"=> $product->image,
                "product_name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product add to cart successfully!');
        }
        return redirect()->back()->with('fail', 'Product failed to deleted!');
    }

    public function checkout(Request $request)
    {
        // dd ($request->all());
        $request->request->add(['address' => $request->user()->address, 'name' => $request->user()->name, 'phone' => $request->user()->phone, 'status' => 'unpaid']);
        $order = Order::create($request->all());
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'email' => $request->user()->email,

            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('buyer.checkout', ['user' => $request->user()], compact('snapToken', 'order'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status'=>'Paid']);
            }
        }
    }
}
