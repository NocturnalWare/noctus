<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $rules = [];
	protected $fillable = [
		'name',
		'description',
		'category',
		'price',
		'active',
		'onsale',
		'upcomming',
		'preorder',
		'xsmall',
		'small',
		'medium',
		'large',
		'xlarge',
		'xxlarge',
		'xxxlarge',
	];
	protected $table = 'products';

	public function inventories()
	{
		return $this->hasOne('\App\Inventory', 'product_id', 'id');
	}

	public function prices(){
		return $this->hasOne('\App\Price', 'product_id', 'id');
	}
	
	public function addInventory($inventory){
		$inventory['product_id'] = $this->id;
		\App\Inventory::create($inventory);
		return;
	}

	public function addPrices($prices){
		$prices['product_id'] = $this->id;
		\App\Price::create($prices);
		return;
	}
	
	public function getMainImage(){
		return 'https://s3-us-west-2.amazonaws.com/etnoc/images/products/'.$this->main_image;
	}
}
