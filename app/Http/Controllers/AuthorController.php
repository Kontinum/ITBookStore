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

    public function searchAuthors(Request $request)
    {
        $this->validate($request,[
            'author-name' => 'required'
        ]);

        $authorName = $request->input('author-name');
        $authors = Author::where('name','LIKE','%'.$authorName.'%')->get();

        if($authors->isEmpty()){
            return back()->with('error','There is no author with that name');
        }

        return view('admin.authorsResult',['authors' => $authors, 'authorName' => $authorName]);
    }

    public function deleteAuthor($authorId)
    {
        $author = Author::find($authorId);
        $name = $author->name;
        $author->delete();

        return redirect()->route('authors')->with('success','Author '.$name.' has been successfully deleted');
    }
}
