<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Slack\SlackHandler;
use \App\Shipping\Handlers\ShippingHandler;

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Error;

use App\Cart\Handlers\CartHandler;

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

    public function getCheckoutPrice(){
        return $this->checkoutAmt(new CartHandler);
    }

    private function checkoutAmt(CartHandler $handler){
        return $handler->checkoutAmt();
    }

    public function completePayment(Request $request, SlackHandler $slacker)
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

         // $charge = 0;

         // $cart->checkoutPrice()
         // Create the charge on Stripe's servers - this will charge the user's card
         try{
            $charge = Charge::create(array(
               "amount" => round($this->getCheckoutPrice()), // amount in cents, again
               "currency" => "usd",
               "source" => $token,
               "description" => \Session::get('cart_id'))
            );
        }catch(\Stripe\Error\Card $e) {
              // The card has been declined
            }
            $cart_id = \Session::get('cart_id');
            $markPaid = \App\Shipping::where('cart_id', \Session::get('cart_id'))->first();
            $markPaid->payment_status = 'Paid';
            $markPaid->shipped_status = 'Not Shipped';
            $markPaid->save();
            
            $slacker->sendSaleMessage();

            \App\Sale::create(array('customer_id' => $markPaid->email, 'cart_id' => \Session::get('cart_id')));

            $purge = [];
            
            foreach(\App\Cart::where('customer_id', $cart_id)->get() as $purgeCarts)
            {    
                $purge[] = $purgeCarts;
                $inventory = \App\Inventory::where('product_id', $purgeCarts->product_id)->pluck($purgeCarts->size);
                $newsize = $inventory - $purgeCarts->quantity;
                \DB::table('inventories')->where('product_id', $purgeCarts->product_id)->update(array($purgeCarts->size => $newsize));
            }

            if(env('APP_ENV') == 'local'){
                \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
                    $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
                });   
            }else{   
                \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
                    $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
                });
            }






            \Session::forget('cart_id');
            \Session::forget('checkoutAmt');


            return redirect()->route('transSuccess');
    }
}
