<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	// Add your validation rules here
	public static $rules = [];
	// Don't forget to fill this array
	protected $fillable = ['customer_id', 'product_id', 'size', 'quantity'];
	
	protected $table = 'carts';

	public function findItemProp($property){
		$item = Product::where('id', $this->item)->pluck($property);
		return($item);
	}
	public function checkoutPrice(){
		$price = $this->quantity * Price::where('product_id', $this->item)->pluck($this->size);
		return($price);
	}
}
