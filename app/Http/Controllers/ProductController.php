<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();

        return view('product.index', ['products' => $products]);

    }

    public function show($id)
    {

        return view('product.details', ['product' => Product::findOrFail($id)]);

    }

    public function create()
    {

        $categories = Category::all();

        return view('product.create', ['categories' => $categories]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'value'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
        ]);

        $category = Category::findOrFail($request->get('category_id'));

        $product = new Product([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
            'quantity' => $request->get('quantity')
        ]);

        $category->products()->save($product);

        return redirect('/products')->with('success', 'Product saved!');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('product.edit', ['product' => $product, 'categories' => $categories]);

    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->get('name');

        $product->save();

        return redirect('/products')->with('success', 'Product updated!');

    }

    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted!');

    }
}
