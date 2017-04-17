<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
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

    public function addSubcategory($categoryId, Request $request)
    {
        $this->validate($request,[
            'subcategory-name' => 'required'
        ]);

        $subcategoryName = $request->input('subcategory-name');
        $subcategory = new Subcategory([
            'category_id' => $categoryId,
            'name'        => $subcategoryName
        ]);
        $subcategory->save();

        return back()->with('success','Subcategory '.$subcategoryName.' has been successfully added');
    }

    public function deleteSubcategory($subcategoryId)
    {
        $subcategory = Subcategory::find($subcategoryId);
        $subcategoryName = $subcategory->name;
        $subcategory->delete();

        return back()->with('success','Subcategory '.$subcategoryName.' has been successfully deleted');
    }
}
