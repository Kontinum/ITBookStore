<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getIndex()
    {
        $popularBooks = Book::orderBy('buyers','DESC')->limit(8)->get();
        $newBooks = Book::orderBy('created_at','DESC')->limit(8)->get();
        return view('shop.index',['popularBooks' => $popularBooks, 'newBooks' => $newBooks]);
    }
}
