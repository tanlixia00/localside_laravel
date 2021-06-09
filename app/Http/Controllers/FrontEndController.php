<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $products = Book::all();
        return view('frontend.index', compact('products'));
    }
    public function cart()
    {
        $this->authorize('cart-permission');
        return view('frontend.cart');
    }

    public function contactUs(){
        return view('frontend.contactUs');
    }

    public function addtoCart( Request $request, $id){
        $product = Book::find($id);
        if(!$product) { abort(404); }
        $cart = $request->session()->get('cart');
        //if your cart is empty then this the first product
        if(!$cart){
            $cart = [
                $id => [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "gambar" => $product->gambar
                ]
            ];
            $request->session()->put('cart', $cart);
            // dd($request->session()->put('cart', $cart));
            return redirect()->back()->with('success', 'product added to cart successfully');
        }
        //if the same product been already there, just update the quantity
        else if(isset($cart[$id])) {
            $cart[$id]['quantity']++;

            $request->session()->put('cart', $cart);
            // dd($request->session()->put('cart', $cart));
            return redirect()->back()->with('success', 'product added to cart successfully');
        }
        else{
            //if item not exist in cart then add 
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "gambar" => $product->gambar
            ];

            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success', 'product added to cart successfully');
        }
    }
}
