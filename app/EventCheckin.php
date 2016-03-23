<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCheckin extends Model
{
    protected $rules = [];
    protected $fillable = [
    	'sale_checkin_id',
    ];
    
    protected $table = 'event_checkins';

}
