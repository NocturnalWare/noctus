<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandTicket extends Model
{
    protected $rules = [];
    protected $fillable = [
	    'band_name',
        'main_image',
        'description',
        'product_id',
        'price',
    ];
    protected $table = 'band_tickets';

    public function product(){
    	return $this->hasOne('\App\Product', 'id', 'product_id');
    }
}
