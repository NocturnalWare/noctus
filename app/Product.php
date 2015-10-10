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
}
