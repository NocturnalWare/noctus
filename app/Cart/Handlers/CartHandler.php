<?php

	namespace App\Cart\Handlers;

	use \App\Cart;

	class CartHandler
	{
		public $cart;

		public function __construct(){
			$this->cart = Cart::where('customer_id', \Session::get('cart_id'))->get();
		}

		public function checkoutAmt(){
	        $total = 0;
	        foreach($this->cart as $cart){
	            $total += $cart->checkoutPrice();
	        }

	        return $total+$this->calculateShipping();
		}

		public function calculateShipping(){
	        $quantity = $this->countItems();
	        if($quantity > 1){
	            return round((($quantity / 2) * 599),0);
	        }else{
	            return 599;
	        }
	    }

	    private function countItems(){
	    	$quantity = 0;
	        foreach($this->cart as $cart){
	        	$quantity += $cart->quantity;
	        }

	        return $quantity;
	    }
	}