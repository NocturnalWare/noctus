<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
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
    	'onesize'
    ];

    protected $table = 'inventories';

    public function inventories(){
    	return $this->belongsTo('\App\Product', 'id', 'product_id');
    }

    public function checkStock(){
    	return $this->xsmall + $this->small + $this->medium + $this->large + $this->xlarge + $this->xxlarge + $this->xxxlarge + $this->onesize;
    }
}
