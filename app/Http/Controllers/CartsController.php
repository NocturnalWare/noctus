<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
  /**
     * Display a listing of carts
     *
     * @return Response
     */
    public function index()
    {
        if(\Session::get('cart_id')){
            $carts = \App\Cart::where('customer_id', \Session::get('cart_id'))->get();
            return view('carts.index', compact('carts'));
        }
        else{
            return redirect()->back();
        }
    }
    /**
     * Show the form for creating a new cart
     *
     * @return Response
     */
    public function create()
    {
        return View::make('carts.create');
    }

    public function createShipping(Request $request)
    {
        \Session::put('checkoutAmt', $request->input('checkoutAmt'));
        return view('carts.createShipping');
    }
    /**
     * Store a newly created cart in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Cart::$rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // \Cart::create($data);
        return redirect()->route('carts.index');
    }
    /**
     * Display the specified cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $cart = \Cart::findOrFail($id);
        return view('carts.index', compact('cart'));
    }
    /**
     * Show the form for editing the specified cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // $cart = Cart::find($id);
        return view('carts.index', compact('cart'));
    }
    /**
     * Update the specified cart in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // $cart = Cart::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Cart::$rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cart->update($data);
        return redirect()->route('carts.index');
    }
    /**
     * Remove the specified cart from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('carts.index');
    }

    public function checkCart(Request $request){
        return \App\Cart::where('customer_id', \Session::get('cart_id'))->where('product_id', $request->input('product'))->get();
    }

    public function addToCart(Request $request)
    {   
        // Session::forget('cart_id');
        if(\Session::get('cart_id')){
            $customer_id = \Session::get('cart_id');
        }else{
            $customer_id = str_random(50);
            \Session::put('cart_id', $customer_id);
        }
        // $item = Input::get('product_id');
        $size = $request->input('size');
        $item = $request->input('product');
        if(\App\Cart::where('customer_id', $customer_id)
            ->where('product_id', $item)
            ->where('size', $size)
            ->pluck('quantity')){
            $quantit = \App\Cart::where('customer_id', $customer_id)
                        ->where('product_id', $item)
                        ->where('size', $size)
                        ->pluck('quantity');
            $cart = \App\Cart::where('customer_id', $customer_id)
                    ->where('product_id', $item)
                    ->where('size', $size)
                    ->first();
            $cart->customer_id = $customer_id;
            $cart->product_id = $item;
            $cart->size = $size;
            $cart->quantity = $quantit+1;
            $cart->save();
        }else{
            $cart = \App\Cart::create([
                'customer_id' => $customer_id,
                'size' => $size,
                'product_id' => $item,
                'quantity' => 1,
            ]);
        return('sucksess');
        }
    }

    public function removeFromCart(Request $request)
    {
        $item = $request->input('product');
        $customer_id = \Session::get('cart_id');
        \App\Cart::destroy($item);
        if(\App\Cart::where('customer_id', $customer_id)->first()){
            return redirect()->back();
        }

        return redirect()->route('products.index');
    }
    
    public function emptyCart()
    {
        \Session::forget('checkoutAmt');
        \Session::forget('cart_id');
        return redirect()->route('products.index');
    }
 
}
