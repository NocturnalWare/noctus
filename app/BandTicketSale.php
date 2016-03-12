<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandTicketSale extends Model
{
    protected $rules = [];
    protected $fillable = [
    	'band_name',
    	'cart_id',
    	'product_id',
    ];

    protected $table = 'band_ticket_sales';
}
