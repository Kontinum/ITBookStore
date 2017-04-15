<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function authors()
    {
        $authors = Author::all();

        return view('admin.authors',['authors' => $authors]);
    }
}
