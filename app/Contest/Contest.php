<?php

namespace App\Contest;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'masq_contest';

    protected $fillable = [
    	'contestant',
    	'invites'
    ];
}
