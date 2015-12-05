<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingLabel extends Model
{
	protected $rules = [];
	protected $fillable = ['label_url'];
	protected $table = 'shipping_labels';
}
