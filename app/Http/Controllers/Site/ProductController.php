<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show($url)
    {
        $product = Product::with('category', 'images', 'tags')->where('url', $url)->first();
        return Inertia::render('Site/Product/Show', ['product' => $product]);
    }
}
