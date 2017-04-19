<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Http\Requests\AddingBookRequest;
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

    public function addBook(AddingBookRequest $request)
    {
        $book = new Book([
            'isbn' => $request->input('book-isbn'),
            'name' => $request->input('book-name'),
            'year' => $request->input('book-year'),
            'description' => $request->input('book-description'),
            'price' => $request->input('book-price'),
            'picture' => $request->input('book-picture'),
            'pages' => $request->input('book-pages'),
        ]);
        $book->save();

        $book->subcategories()->attach($request->input('book-categories'));
        $this->attachCategories($book, $request->input('book-categories'));
        $book->authors()->attach($request->input('book-authors'));

        return back()->with('success','Book '.$book->name.' has been successfully added');
    }

    public function attachCategories(Book $book,$subcategoriesId)
    {
        foreach ($subcategoriesId as $subcategoryId) {
            $subcategory = Subcategory::find($subcategoryId);
            $category = Category::find($subcategory->category_id);
            $book->categories()->attach($category->id);
        }
    }
}
