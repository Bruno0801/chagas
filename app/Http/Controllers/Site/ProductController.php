<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show($url)
    {
        return Inertia::render('Site/Product/Show');
        Product::with('category', 'images', 'tags')->where('url', $url)->first();
    }
}
