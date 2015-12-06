<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $rules = [];
    protected $fillable = ['cart_id', 'customer_id'];
    protected $table = 'sales';

    public function cartsBySale(){
    	return $this->hasMany('\App\Cart', 'customer_id', 'cart_id');
    }

    public function shippingBySale(){
    	return $this->hasMany('\App\Shipping', 'email', 'customer_id');
    }

    public function getShippingAddress(){
    	return \App\Shipping::where('cart_id', $this->cart_id)->first();
    }

    public function shippingLabel(){
    	return $this->hasOne('\App\ShippingLabel', 'cart_id', 'cart_id');
    }
}
