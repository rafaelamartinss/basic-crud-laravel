<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);

    }

    public function show($id)
    {

        return view('category.details', ['category' => Category::findOrFail($id)]);

    }

    public function create()
    {

        return view('category.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category = new Category([
            'name' => $request->get('name')
        ]);
        $category->save();

        return redirect('/categories')->with('success', 'Category saved!');
    }

    public function edit($id)
    {

        return view('category.edit', ['category' => Category::findOrFail($id)]);

    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->name = $request->get('name');

        $category->save();

        return redirect('/categories')->with('success', 'Category updated!');

    }

    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Category deleted!');

    }
}
