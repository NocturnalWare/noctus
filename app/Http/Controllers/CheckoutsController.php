<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Error;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('carts.success');
    }

    public function alreadyPaid()
    {
        \Session::forget('cart_id');
        \Session::forget('checkoutAmt');
        return view('carts.alreadyPaid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function completePayment(Request $request)
    {
     // Set your secret key: remember to change this to your live secret key in production
     // See your keys here https://dashboard.stripe.com/account/apikeys
         Stripe::setApiKey(env('STRIPE_SK'));

         // Get the credit card details submitted by the form
         $token = $request->input('stripeToken');
         // dd(\Session::get('cart_id'));
         if(!\Session::get('cart_id')){
          return redirect()->route('alreadyPaid');
         }

         if(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
          return redirect()->route('alreadyPaid');
         }
     // Create the charge on Stripe's servers - this will charge the user's card
     try {
     $charge = Charge::create(array(
       "amount" => \Session::get('checkoutAmt'), // amount in cents, again
       "currency" => "usd",
       "source" => $token,
       "description" => \Session::get('cart_id'))
     );
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined
    }
            $cart_id = \Session::get('cart_id');
            $markPaid = \App\Shipping::where('cart_id', \Session::get('cart_id'))->first();
            $markPaid->payment_status = 'Paid';
            $markPaid->shipped_status = 'Not Shipped';
            $markPaid->save();

            foreach(\App\Cart::where('customer_id', $cart_id)->get() as $purgeCarts)
            {    
             $inventory = \App\Inventory::where('product_id', $purgeCarts->item)->pluck($purgeCarts->size);
             $newsize = $inventory - $purgeCarts->quantity;
             DB::table('inventories')->where('product_id', $purgeCarts->item)->update(array($purgeCarts->size => $newsize));
            }

            
            \Mail::send('emails.Newsale', array('cart' => $cart_id, 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
             $checkoutAmt = \Session::get('checkoutAmt');
             $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
            });
            \Mail::send('emails.Newsaleadmin', array('cart' => $cart_id, 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
             $checkoutAmt = \Session::get('checkoutAmt');
             $message->to('billing@eternallynocturnal.com')->subject("NEW SALE $".substr($checkoutAmt,0,-2).".".substr($checkoutAmt,-2));
            });

            \App\Sale::create(array('customer_id' => $markPaid->email, 'cart_id' => \Session::get('cart_id')));

            \Session::forget('cart_id');
            \Session::forget('checkoutAmt');

            return redirect()->route('transSuccess');
        }
    
}