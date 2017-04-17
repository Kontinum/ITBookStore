<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function addCategory(Request $request)
    {
        $this->validate($request,[
            'category-name' => 'required'
        ]);

        $categoryName = $request->input('category-name');
        $category = new Category([
            'name' => $categoryName
        ]);
        $category->save();

        return back()->with('success','Category '.$categoryName.' has been successfully added');
    }
}
