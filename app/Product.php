<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $rules = [];
	protected $fillable = [];
	protected $table = 'products';

	public function inventories()
	{
		return $this->hasOne('\App\Inventory', 'product_id', 'id');
	}

	public function prices(){
		return $this->hasOne('\App\Price', 'product_id', 'id');
	}
}
