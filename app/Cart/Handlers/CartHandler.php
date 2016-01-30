<?php

	namespace App\Cart\Handlers;

	use \App\Cart;

	class CartHandler
	{
		public $cart;
		private $ticketprice;

		public function __construct(){
			$this->cart = Cart::where('customer_id', \Session::get('cart_id'))->with('product')->get();
		}

		public function checkoutAmt(){
	        $total = 0;

	        foreach($this->cart as $cart){
	            $total += $cart->checkoutPrice();
	        }
	        
	        $total = $this->checkoutTotal($total);

	        \Session::put('checkoutAmt', $total);

	        return $total;
		}

		public function calculateShipping(){
			if($this->hasTicket()){
				return 0;
			}

	        $quantity = $this->countItems();
	        if($quantity > 1){
	            return round((($quantity / 2) * 599),0);
	        }else{
	            return 599;
	        }
	    }

	    protected function checkoutTotal($total){
	        $total = $total + $this->calculateShipping();

	        if($this->hasTicket()){
	        	$total = (($total - $this->ticketprice) * .9) + $this->ticketprice;
	        }

	        return round($total);
	    }

	    //checks if there's a ticket in the cart.
	    protected function hasTicket(){
	    	foreach($this->cart as $cart){
	        	if($cart->isTicket()){
	        		$this->ticketprice = $cart->checkoutPrice();
	        		return 1;
	        	}
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

	    public function cartInventory($item, $size){
	    	$count = 0;
	    	foreach($this->cart as $cart){
	    		if($cart->product->id == $item && $cart->size == $size){
	    			$count = $count + $cart->quantity;
	    		}
	    	}

	    	return $count;
	    }

	    public function checkInventory($item, $size){
			$checkInventory = \App\Inventory::where('product_id', $item)->pluck($size) - $this->cartInventory($item, $size);
    
	        if($checkInventory > 0){
	            return 1;
	        }
    	}
	}