<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts() {
        $products = Product::get();
        return $products;
    }

    public function index(Request $request)
    {
        $products = $this->getProducts();

        $category = $request->input('category', 'all');

        if ($category !== 'all') {
            $products = array_filter($products, fn($p) => $p['category'] === $category);
        }

        return view('catalog', compact('products', 'category'));
    }

    public function show($id) {
        $products = $this->getProducts();

        $product = collect($products)->firstWhere('id', (int)$id);

        if (!$product) {
            abort(404, 'Товар не найден');
        }

        return view('product', compact('product'));
    }
}
