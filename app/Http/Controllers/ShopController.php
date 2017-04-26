<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cart;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Order;
use Stripe\Stripe;

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

    public function categoryBooks(Category $category)
    {
        $books = $category->books()->get();

        return view('shop.categoryBooks',['books'=>$books,'categoryName' => $category->name]);
    }

    public function subcategoryBooks(Subcategory $subcategory)
    {
        $books = $subcategory->books()->get();

        return view('shop.subcategoryBooks',['books'=>$books,'subcategoryName' => $subcategory->name]);
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

    public function checkout()
    {
        if(!session()->has('cart')){
            return redirect()->route('getIndex');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('shop.checkout', ['totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(Request $request)
    {
        if(!session()->has('cart')){
            return redirect()->route('getIndex');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        //setting our secret stripe key
        Stripe::setApiKey('sk_test_HtliPx7nEk2G9WuJt9BGoF0q');

        //trying to create a charge
        try
        {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Charge for ".auth()->user()->name." at ".auth()->user()->email
            ));

            //if charging is success
            $order = new \App\Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            auth()->user()->orders()->save($order);
        }catch(\Exception $e){
            return redirect()->route('checkout')->with('error',$e->getMessage());
        }
        session()->forget('cart');
        return redirect()->route('getIndex')->with('success','Successfully purchased books! :)');
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
