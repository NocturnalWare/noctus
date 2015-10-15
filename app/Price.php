<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
	protected $rules = [];
	protected $fillable = [
			'product_id',
			'xsmall',
			'small',
			'medium',
			'large',
			'xlarge',
			'xxlarge',
			'xxxlarge',
			'onesize',
	];
	protected $table = 'prices';
}
