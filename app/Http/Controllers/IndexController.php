<?php

namespace App\Http\Controllers;

use App\Models\Product;

class IndexController extends Controller {
    public function index() {
        $products = Product::get();
        return view('index', compact('products'));
    }
}