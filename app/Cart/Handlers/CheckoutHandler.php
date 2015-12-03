<?php

namespace App\Cart\Handlers;

use \App\Slack\SlackHandler;

class CheckoutHandler
{
	private $slacker;
	private $payment;
	private $shipping;

	public function __construct(SlackHandler $slack, PaymentHandler $payment, ShippingHandler $shipping){
		$this->slacker = $slack;
		$this->payment = $payment;
		$this->shipping = $shipping;
	}

	public function findShipping($id){
		return $this->shipping->find($id);
	}

	public function checkPayment(){
		if(!\Session::get('cart_id')){
          	return redirect()->route('alreadyPaid');
        }

        if($this->shipping->where('cart_id', \Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
         	return redirect()->route('alreadyPaid');
        }
	}

	public function sendSaleMessage(){
    	$this->slacker->sendMessage('#thunderdome', $this->parseSale(), 'New WEB Sale!');
    	
    	sleep(2);

    	$this->slacker->sendMessage('#thunderdome', $this->parseShipping(), '');
    }

    public function parseSale(){
        $total = number_format(\Session::get('checkoutAmt')/100, 2);
        $messageitems = [];

    	foreach(\App\Cart::where('customer_id', \Session::get('cart_id'))->get() as $cart)
        {    
    		$name = $cart->findItemProp('name');
	        $messageitems[] = ['title' => "Item $name"];
	        $messageitems[] = ['title' => "Size: $cart->size"];
	        $messageitems[] = ['title' => "Quantity: $cart->quantity"];
	        $messageitems[] = ['title' => "_________________________"];
        }

        $slackcart = [
            'fallback' => 'It is all broken, man',
            'color' => 'good',
            'fields' => $messageitems,
        ];

        return $slackcart;
    }

    public function parseShipping(){
        $total = number_format(\Session::get('checkoutAmt')/100, 2);
    	$shipping = \App\Shipping::where('cart_id', \Session::get('cart_id'))->first();
    	$messageitems = [];
        $messageitems[] = ['title' => "\n"];
        $messageitems[] = ['title' => "Ship To:"];
        $messageitems[] = ['title' => "$shipping->ship_f_name $shipping->ship_l_name"];
        $messageitems[] = ['title' => "$shipping->ship_address1 $shipping->ship_address2"];
        $messageitems[] = ['title' => "$shipping->ship_city $shipping->ship_state $shipping->ship_zip"];

        $shippingmessage = [
                'fallback' => 'It is all broken, man',
                'pretext' => "Total: \$$total",
                'color' => 'good',
                'fields' => $messageitems,
            ]; 

        return $shippingmessage;
    }




}