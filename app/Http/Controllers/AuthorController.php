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

    public function addAuthor(Request $request)
    {
        $this->validate($request,[
            'author-name' => 'required'
        ]);

        $author = new Author([
            'name' => $request->input('author-name')
        ]);
        $author->save();

        return redirect()->route('authors')->with('success','Author '.$request->input('author-name').' has been successfully added');
    }
}
