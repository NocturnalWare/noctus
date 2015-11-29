<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $rules = [];
    protected $fillable = ['cart_id', 'customer_id'];
    protected $table = 'sales';
}
