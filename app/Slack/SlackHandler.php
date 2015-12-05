<?php 

namespace App\Slack;

use App\Cart;
use GuzzleHttp\Exception\ClientException;

class SlackHandler
{
    public function sendSaleMessage(){
    	$cart = $this->parseSale();
        if(env('APP_ENV') == 'local'){
           \Slack::to('#thunderdome')->attach($cart)->send('New WEB Sale!'); 
        }else{
           \Slack::to('#websales')->attach($cart)->send('New WEB Sale!'); 
        }

        sleep(2);

        $shipping = $this->parseShipping();
        if(env('APP_ENV') == 'local'){
           \Slack::to('#thunderdome')->attach($shipping)->send('New WEB Sale!'); 
        }else{
           \Slack::to('#websales')->attach($shipping)->send();
        }
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

    public function sendShippingLabel($shipping){
        \Slack::to('#thunderdome')->send("USPS Label:\n $shipping");
    }
}
