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
        
        $authors = $this->checkAuthors($request->input('book-authors'));
        $authorsId = Author::whereIn('name',$authors)->get()->pluck('id')->toArray();
        $book->authors()->attach($authorsId);

        return back()->with('success','Book '.$book->name.' has been successfully added');
    }

    public function postEditBook($bookId, AddingBookRequest $request)
    {
        $book = Book::find($bookId);

            $book->isbn = $request->input('book-isbn');
            $book->name = $request->input('book-name');
            $book->year = $request->input('book-year');
            $book->description = $request->input('book-description');
            $book->price = $request->input('book-price');
            $book->picture = $request->input('book-picture');
            $book->pages = $request->input('book-pages');

        $book->save();

        $book->subcategories()->sync($request->input('book-categories'));
        $this->syncCategories($book, $request->input('book-categories'));

        $authors = $this->checkAuthors($request->input('book-authors'));
        $authorsId = Author::whereIn('name',$authors)->get()->pluck('id')->toArray();
        $book->authors()->sync($authorsId);

        return back()->with('success','Book has been successfully added');
    }

    public function attachCategories(Book $book,$subcategoriesId)
    {
        foreach ($subcategoriesId as $subcategoryId) {
            $subcategory = Subcategory::find($subcategoryId);
            $category = Category::find($subcategory->category_id);
            $book->categories()->attach($category->id);
        }
    }

    public function syncCategories(Book $book,$subcategoriesId)
    {
        $categoriesId = [];
        foreach ($subcategoriesId as $subcategoryId) {
            $subcategory = Subcategory::find($subcategoryId);
            $category = Category::find($subcategory->category_id);
            $categoriesId[] = $category->id;
        }
        $book->categories()->sync($categoriesId);
    }

    public function checkAuthors(array $authors)
    {
        $authorsNames = [];
        foreach ((array)$authors as $authorName) {
            $findAuthor = Author::where('name',$authorName)->get();
            if($findAuthor->isEmpty()){
                $author = new Author([
                    'name' => $authorName
                ]);
                $author->save();
                $authorName = $author->name;
            }
            $authorsNames[] = $authorName;
        }
        return $authorsNames;
    }

    public function searchBooks(Request $request)
    {
        $this->validate($request,[
            'book-name' => 'required'
        ]);

        $bookName = $request->input('book-name');
        $books = Book::where('name','LIKE','%'.$bookName.'%')->get();

        return view('admin.booksResult',['books' => $books, 'bookName' => $bookName]);
    }

    public function getEditBook($bookId)
    {
        $book = Book::find($bookId);
        $authors = Author::all();
        $subcategories = Subcategory::all();

        return view('admin.editBook', ['book' => $book, 'authors' => $authors, 'subcategories' => $subcategories]);
    }

    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);
        $bookName = $book->name;
        $book->delete();

        return back()->with('success','Book '.$bookName.' has been successfully deleted');
    }
}
