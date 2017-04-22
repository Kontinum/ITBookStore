<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getIndex()
    {
        $popularBooks = Book::orderBy('buyers','DESC')->limit(8)->get();
        $newBooks = Book::orderBy('created_at','DESC')->limit(8)->get();
        return view('shop.index',['popularBooks' => $popularBooks, 'newBooks' => $newBooks]);
    }

    public function book($bookId)
    {
        $book = Book::find($bookId);

        if(!$book){
            return redirect()->route('getIndex');
        }

        $categories = Category::all();

        return view('shop.book', ['book' => $book, 'categories' => $categories]);
    }
}
