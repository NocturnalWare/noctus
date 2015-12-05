<?php

namespace App\Admin\Handlers;

use App\Sale;

class SalesManager
{
	private $sale;

	public function __construct(Sale $sale){
		$this->sale = $sale;
	}

	public function allSales(){
		return $this->sale->with('cartsBySale', 'cartsBySale.product', 'shippingBySale', 'shippingLabel')->get();
	}
}