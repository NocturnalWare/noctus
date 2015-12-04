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
		return \App\Product::where('id', $this->product_id)->pluck($property);
	}
	public function checkoutPrice(){
		return $this->quantity * \App\Price::where('product_id', $this->product_id)->pluck($this->size);
	}

	public function product(){
		return $this->hasOne('\App\Product', 'id', 'product_id');
	}
}
