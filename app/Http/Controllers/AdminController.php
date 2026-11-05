<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategory;
use App\Http\Requests\CreateProduct;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        
        $products = Product::get();
        $categories = Category::get();
        return view('admin', compact('products', 'categories'));
    }
    public function createProduct(CreateProduct $request)
    {
        $photo = $request->file('photo');
        $photoExt = $photo->extension();

        $uniqueName = Str::random();
        $photoName = $uniqueName . '.' . $photoExt;
        $pathFolder = 'assets/products/images/';

        $photo->move(public_path($pathFolder), $photoName);


        $data = $request->validated();
        $data['photo'] = $pathFolder . $photoName;

        Product::create($data);

        return redirect(route('admin'))->with('success', 'Товар добавлен');
    }

    public function updateProduct(Request $request, int $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect(route('admin'))->with('error', 'Товар не найден');
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'model' => $request->model,
            'category' => $request->category,
            'description' => $request->description,
            'release_year' => $request->release_year,
            'origin_country' => $request->origin_country,
            'quantity_in_stock' => $request->quantity_in_stock,
        ]);
        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $photoType = $photo->extension();

            $uniqueName = Str::random();
            $photoName = $uniqueName . '.' . $photoType;
            $pathFolder = 'assets/products/images/';

            $photo->move(public_path($pathFolder), $photoName);
            Product::find($id)->update([
                'photo' => $pathFolder . $photoName,
            ]);
        }

        return redirect(route('admin'))->with('success', 'Товар с id' . $id . 'обновлен');
    }

    public function deleteProduct(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect(route('admin'))->with('error', 'Товар с id' . $id . 'не найден');
        }

        $photoPath = public_path($product->photo);
        if (File::exists($photoPath)) {
            File::delete(($photoPath));
        }

        $product->delete();

        return redirect(route('admin'))->with('success', 'Товар с id' . $id . 'удален');
    }

    public function createCategory(CreateCategory $request)
    {
        Category::create($request->validated());
        return redirect(route('admin'))->with('success', 'Категория добавлена');
    }

    public function updateCategory(Request $request, int $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('admin'))->with('error', 'Товар не найден');
        }
        $category->update([
            'name' => $request->name,
        ]);

        return redirect(route('admin'))->with('success', 'Категория с id' . $id . 'обновлена');
    }

    public function deleteCategory(int $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('admin'))->with('error', 'Товар не найден');
        }
        $category->delete();
        return redirect(route('admin'))->with('success', 'Категория с id' . $id . 'удалена');
    }
}
