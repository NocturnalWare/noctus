<?php

namespace App\Images\Handlers;

use App\Images\Models\ProductImage;
use App\Images\Models\GeneralImage;

class ImageHandler
{
	private $productimage;
	private $generalimage;

	public function __construct(ProductImage $productimage, GeneralImage $generalimage){
		$this->generalimage = $generalimage;
		$this->productimage = $productimage;
	}

	public function awsUploader($type, $input, $name, $image){
		$disc = \Storage::disk('s3');
		switch($type){
			case 'thumb':
		        $disc->put(
		            "$name",
		            file_get_contents(public_path().'/thumbs/'.$image)
		        );
        		unlink(public_path().'/thumbs/'.$image);
			break;
			case 'image':
		        $disc->put(
		            "$name",
		            file_get_contents(public_path().'/images/'.$image)
		        );
        		unlink(public_path().'/images/'.$image);
			break;
		}
	}

	public function uploadProductImage($input){
	}

	public function uploadGeneralImage($input){

		$newimagename = $this->generateAWSName($input);

		$data = [];
		$data['url'] = $newimagename;
		$data['sort_order'] = $this->getSortOrder('general')+1;

		if(is_null($data['sort_order'])){
			$data['sort_order'] = 1;
		}

		$data['active'] = $input->active;

		if(is_null($data['active'])){
			$data['active'] = 0;
		}


		$data['name'] = $input->name;
		$data['photographer'] = $input->photographer;
		$data['description'] = $input->description;

		$this->generalimage->create($data);

		$this->makeThumbnail($input, $newimagename);

		// $image = \Image::make($input->file)->resize(300, 200);
		// $image->save('../public/images/'.$newimagename);

		// $this->awsUploader($input, $data['url'], $newimagename);

		return redirect()->route('imagemanager.index');
	}

	public function makeThumbnail($input, $name){
		$image = \Image::make($input->file)->encode('jpg')->save('../public/images/'.$name);
		$image;
		$url = '/general/images/'.$name;
		$this->awsUploader('image', $input, $url, $name);

		$image = \Image::make($input->file)->encode('jpg')->resize(300, 200);
		$image->save('../public/thumbs/'.$name);
		$url = '/general/thumbnails/'.$name;
		$this->awsUploader('thumb', $input, $url, $name);
	}

	public function allProductImages(){
		return $this->productimage->get();
	}

	public function allGeneralImages(){
		return $this->generalimage->get();
	}

	public function allImages(){
		return ['products' => $this->allProductImages(), 'general' => $this->allGeneralImages()];
	}

	public function generateAWSName($input){
		return str_random('50').".".$input->file->getClientOriginalExtension();
	}

	public function getSortOrder($type){
		switch ($type) {
			case 'general':
				return $this->generalimage->orderBy('sort_order', 'desc')->pluck('sort_order');
			break;
			case 'product':
				return $this->productimage->orderBy('sort_order', 'desc')->pluck('sort_order');
			break;
		}
	}
}