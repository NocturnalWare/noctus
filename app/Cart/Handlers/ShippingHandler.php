<?php

namespace App\Cart\Handlers;

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Error;
use App\Shipping;

class ShippingHandler
{
	private $shipping;

	public function __construct(Shipping $shipping){
		$this->shipping = $shipping;
	}

	public function find($id){
		return $this->shipping->find($id);
	}
}