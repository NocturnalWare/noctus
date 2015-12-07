<?php

namespace App\Images\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralImage extends Model
{
	protected $rules = [];
	protected $fillable = [
        'sort_order',
        'active',
        'type',
        'name',
        'description',
        'photographer',
        'url',
	];
	protected $table = 'general_images';

	public function thumbnailURL(){
		return 'https://s3-us-west-2.amazonaws.com/etnoc/general/thumbnails/'.$this->url;
	}

	public function imageURL(){
		return 'https://s3-us-west-2.amazonaws.com/etnoc/general/images/'.$this->url;
	}
}
