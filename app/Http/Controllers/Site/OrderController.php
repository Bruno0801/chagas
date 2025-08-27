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
        $o = Order::where('user_id', Auth::id())->first();
        $orders = OrderProduct::with(['product' => function ($q) {
            $q->with('category');
        }])->where('order_id', $o->id)->get();
        if (count($orders))
            return Inertia::render('Site/Checkout/Order/Index', ['orders' => $orders]);
        return redirect()->route('site.home.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request->op) {
            $op = OrderProduct::find($request->op);
            $op->increment('quantity');
            $order = $op->order;
        } else {
            $order = Order::where('user_id', $user->id)->first();
            if (!$order) {
                $order = Order::create([
                    'user_id' => $user->id
                ]);
            }
            $product = Product::find($request->product_id);
            $op = OrderProduct::where('product_id', $product->id)->where('size', $request->size)->first();
            if ($op) {
                $op->increment('quantity');
            } else {
                $op = OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'size' => $request->size,
                ]);
            }
        }
        $price = $order->price + $op->product->price;
        $order->update(['price' => $price]);
        return redirect()->route('site.checkout.order.index');
    }

    public function destroy(Request $request)
    {
        $op = OrderProduct::find($request->op);
        $order = $op->order;

        if ($op->quantity == 1)
            $op->delete();
        else
            $op->decrement('quantity');

        $price = $order->price - $op->product->price;
        $order->update(['price' => $price]);
        return redirect()->route('site.checkout.order.index');
    }
}
