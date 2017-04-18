<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Subcategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books()
    {
        $books = Book::orderBy('name','ASC')->get();
        $authors = Author::all();
        $subcategories = Subcategory::all();

        return view('admin.books',['books' => $books,'authors' => $authors,'subcategories' => $subcategories]);
    }
}
