<?php

namespace App\Images\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $rules = [];
	protected $fillable = [
            'sort_order',
            'product_id',
            'active',
            'main_image',
            'name',
            'description',
            'photographer',
            'url'
	];
	protected $table = 'product_images';
}
