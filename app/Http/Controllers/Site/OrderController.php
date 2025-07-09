<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{

    public function index()
    {
        return Inertia::render('Site/Checkout/Order/Index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $product = Product::where('id', $request->product_id)->first();
        $order = Order::where('user_id', $user->id)->first();
        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id
            ]);
        }
        //Ta dando erro aqui
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
        ]);
        return $price = $order->products();
    }
}
