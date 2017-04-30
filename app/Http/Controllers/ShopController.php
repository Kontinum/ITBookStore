<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Cart;
use App\Category;
use App\Mail\OrderPurchased;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $books = $category->books()->orderBy('created_at','DESC')->get();

        return view('shop.categoryBooks',['books'=>$books,'categoryName' => $category->name]);
    }

    public function subcategoryBooks(Subcategory $subcategory)
    {
        $books = $subcategory->books()->orderBy('created_at','DESC')->get();

        return view('shop.subcategoryBooks',['books'=>$books,'subcategoryName' => $subcategory->name]);
    }

    public function authorBooks(Author $author)
    {
        $books = $author->books()->orderBy('created_at','DESC')->get();

        return view('shop.authorBooks',['books'=>$books,'authorName' => $author->name]);
    }

    public function bookSearch(Request $request)
    {
        $this->validate($request,[
            'book' => 'required'
        ]);

        $bookName = $request->input('book');

        $books = Book::where('name','LIKE','%'.$bookName.'%')->orderBy('created_at','DESC')->get();

        return view('shop.bookSearch',['books' => $books, 'bookName' => $bookName]);
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders()
            ->where('delivered',1)
            ->orderBy('created_at','DESC')->get();

        if($orders->isEmpty()){
            return back()->with('error','You don\'t have any orders');
        }

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('shop.getOrders',['orders' => $orders]);
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function uncheckedOrders()
    {
        $orders = \App\Order::where('checked',0)
            ->orderBy('created_at','ASC')->get();

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('admin.uncheckedOrders',['orders' =>$orders]);
    }

    public function checkOrder($orderId)
    {
        $order = \App\Order::find($orderId);

        $order->checked = 1;
        $order->save();

        return back()->with('success','Order has been successfully checked');
    }

    public function deliverOrder($orderId)
    {
        $order = \App\Order::find($orderId);

        $order->delivered = 1;
        $order->save();

        return back()->with('success','Order has been successfully marked as delivered');
    }

    public function searchOrders(Request $request)
    {
        $this->validate($request,[
            'order-id' => 'required'
        ]);

        $payment_id = $request->input('order-id');

        $order = \App\Order::where('payment_id',$payment_id)->get();

        $order->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('admin.orderResult',['order' => $order, 'payment_id' => $payment_id]);
    }

    public function deleteOrder($orderId)
    {
        $order = \App\Order::find($orderId);
        $order->delete();

        return back()->with('success','Order has been successfully deleted');
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
            $order->phone = $request->input('phone');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            auth()->user()->orders()->save($order);
            Mail::to(auth()->user()->email)->send(new OrderPurchased($order));
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
