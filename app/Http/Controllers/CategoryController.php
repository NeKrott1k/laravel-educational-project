<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories() {
        $categories = Category::get();
        return $categories;
    }

    public function show($id) {
        $categories = $this->getCategories();

        $category = collect($categories)->firstWhere('id', (int)$id);

        if (!$category) {
            abort(404, 'Товар не найден');
        }

        return view('admin', compact('category', 'category'));
    }
}
