<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Admin\Handlers\SalesManager;
use App\Slack\SlackHandler;
use App\Shipping\Handlers\ShippingHandler;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SalesManager $sales)
    {
       $sales = $sales->allSales();
       return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

                   
        
// \App\Cart::where('customer_id', 'ChWvZc3Mm6GtY7EJCvKnr4XZqllJQZ8w033KRTVEUKOYj1kCR7')->get() 

            // \Mail::send('emails.Newsale', array('cart' => $cart_id, 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
            // $checkoutAmt = \Session::get('checkoutAmt');
            // $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
            // });
            \Mail::send('emails.productshipped', array(
                'cart' => \App\Cart::where('customer_id', 'AnVUUCPqtts5zelVNJS9i7hvs3YC4eju4ps5ydTP40SP3pbd23')->get(), 
                'customer' => \App\Shipping::where('id', 13)->first()
                ), function($message){
                $message->to('joe@manulith.com')->subject("Your Eternally Nocturnal Order");
            });

            return 'success';
        // return $ship->buildLabel();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $size, ShippingHandler $ship)
    {
        return $ship->buildLabel($id, $size);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trackPackage($id, ShippingHandler $ship)
    {
        return $ship->trackPackage($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
