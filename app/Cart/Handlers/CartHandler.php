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
	        $subtotal = 0;

	        foreach($this->cart as $cart){
	            $subtotal += $cart->checkoutPrice();
	        }

	        $total = $subtotal + $this->calculateShipping();

	        \Session::put('checkoutAmt', $total);

	        return $total;
		}

		public function calculateShipping(){
	        $quantity = $this->countItems();
	        if($quantity > 1){
	            return round((($quantity / 2) * 599),0);
	        }else{
	            return 599;
	        }
	    }

	    public function countItems(){
	    	$quantity = 0;
	        foreach($this->cart as $cart){
	        	$quantity += $cart->quantity;
	        }
	        \Session::put('cart_quantity', $quantity);
	        return $quantity;
	    }
	}