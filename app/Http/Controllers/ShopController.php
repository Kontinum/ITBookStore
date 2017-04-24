<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function addToCart($bookId)
    {
        $book = Book::find($bookId);

        if(!$book){
            return redirect()->route('getIndex');
        }

        $oldCart = session()->has('cart') ? session()->get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($book);

        session()->put('cart',$cart);

        return back();
    }

    public function shoppingCart()
    {
        if(!session()->has('cart')){
            return back()->with('error','Your shopping cart is empty');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shoppingCart',['items' => $cart->items, 'totalQty' => $cart->totalQty, 'totalPrice' => $cart->totalPrice]);
    }

    public function decreaseByOne($itemId)
    {
        if(!session()->has('cart')){
            return redirect()->route('getIndex');
        }

        $book = Book::find($itemId);
        if(!$book){
            return redirect()->route('getIndex');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        $decreaseByOne = $cart->decreaseByOne($itemId,$book);

        if($decreaseByOne){
            session()->put('cart',$cart);
            if($cart->totalQty == 0){
                session()->forget('cart');
                return redirect()->route('getIndex')->with('error','Your shopping cart is empty');
            }
            return redirect()->route('shoppingCart');
        }
        return redirect()->route('getIndex');
    }

    public function increaseByOne($itemId)
    {
        if(!session()->has('cart')){
            return redirect()->route('getIndex');
        }

        $book = Book::find($itemId);
        if(!$book){
            return redirect()->route('getIndex');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        $increaseByOne = $cart->increaseByOne($itemId,$book);

        if($increaseByOne){
            session()->put('cart',$cart);
            return redirect()->route('shoppingCart');
        }
        return redirect()->route('getIndex');
    }
}
