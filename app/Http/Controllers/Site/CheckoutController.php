<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function orderIndex()
    {
        return Inertia::render('Site/Checkout/Order/Index');
    }
    public function orderCreate() {}
    public function orderDelete() {}

    public function addressIndex()
    {
        return Inertia::render('Site/Checkout/Address/Index');
    }

    public function freightIndex()
    {
        return Inertia::render('Site/Checkout/Freight/Index');
    }

    public function paymentIndex()
    {
        return Inertia::render('Site/Checkout/Payment/Index');
    }
}
