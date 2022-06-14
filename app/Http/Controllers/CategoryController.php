<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $categories = Category::paginte(5);
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {

        //validation diy
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/category')->with('status', 'Record saved');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        // return $category;

        $category->delete();
        return redirect('/category')->with('status', 'Record deleted');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/edit', compact('category'));
    }

    public function update($id, Request $request)
    {

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/category')->with('status', 'Record updated');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return $category->blogs;
    }
}
