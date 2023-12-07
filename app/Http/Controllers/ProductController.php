<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function list(Request $request)
    {
    }

    public function create()
    {
        return view('products.create');
    }

  

    public function store(ProductRequest $request)
    {


        $data = $request->all();

        $path = public_path('images/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $file_name = time() . '.' . $request->image->extension();
        $request->image->move($path, $file_name);

        $data['image'] = $file_name;

        Product::create($data);
        return redirect()->route('products.index')
            ->withSuccess('You have create successfully!');
    }

    public function show(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {

        $data = $request->all();

        if ($request->file('image')) {

            if ($product->image) {
                $path_old = public_path('images/' . $product->image);
                if (file_exists($path_old)) {
                    unlink($path_old);
                }
            }

            $path = public_path('images/');

            $file_name = time() . '.' . $request->image->extension();
            $request->image->move($path, $file_name);
            $data['image'] = "$file_name";
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess('You have delete successfully!');
    }
}
