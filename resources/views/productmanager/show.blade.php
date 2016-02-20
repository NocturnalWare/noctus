@extends('layouts.master')



@section('content')

<div class="row" style="background-color:#000;">
	<div class="col-xs-12 productmanager" style="margin-top:70px;">
			<img class="col-xs-12 col-md-3 well img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}">
			<div class="col-xs-12 col-md-9" style="color:#000;padding:5px;">

				<div class="col-xs-12 col-md-3" style="border-radius:10px;background-color:#fff;"> 
					<!-- main form -->
						<form method="POST" action="{{route('productmanager.update')}}" enctype="multipart/form-data">
							<label class="col-xs-12" style="">Item Name</label>
							<input value="{{$product->name}}" class="col-xs-12"name="name">
							<label class="col-xs-12" style="">Category</label>
							<select class="col-xs-12" name="category" value="{{$product->category}}">
								@foreach($categories as $cat)
									<option value="{{$cat->name}}">{{$cat->name}}</option>
									@if($product->category == $cat->name)
										<option selected>{{$cat->name}}</option>
									@endif
								@endforeach
							</select>
							<label class="col-xs-12" style="">Price Display</label>
							<input value="{{$product->price}}" class="col-xs-12"name="price">
							<label class="col-xs-12" style="">Description</label>
							<textarea value="{{$product->description}}" class="col-xs-12" style="height:300px;width:100%">{{$product->description}}</textarea>
						</form>
				</div>
				<div class="col-xs-12 col-md-6"> 
					<div style="border-radius:10px;background-color:#fff;">
						<ul class="nav nav-tabs">
						  <li class="col-xs-6" role="presentation" class="active"><a href="#sizes" class="btn" aria-controls="settings" role="tab" data-toggle="tab">Size & Price</a></li>
						  <li class="col-xs-6" role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Inventory</a></li>
						</ul>
						<table class="table" style="color:#000">
							<thead>
								<th class="col-xs-4">Available</th>
								<th class="col-xs-4">Size</th>
								<th class="col-xs-4">Price</th>
							</thead>
							<tbody class="table-striped">
								@foreach(['xsmall', 'small', 'medium', 'large', 'xlarge', 'xxlarge', 'xxxlarge'] as $size)
							  		<tr>
							  			@if($product[$size] == 1)
							  				<td><input type="checkbox" name="{{$size}}" checked="checked" value="1"></checkbox></td>
							  			@else
							  				<td><input type="checkbox" name="{{$size}}" value="1"></checkbox></td>
							  			@endif
							  			<td><label>{{studly_case($size)}}</label></td>
							  			<td><input value="{{number_format($product->prices[$size]/100, 2)}}" name="{{$size}}"/></td>
							  		</tr>
							  	@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-12 col-md-3"> 
					<!-- Editor Links -->
					<ul class="list-group">
						<li class="list-group-item btn col-xs-12" style="background-color:#fff">
							<i class="fa fa-camera"></i> Images <i class="fa fa-arrow-right"></i>
						</li>
						<li class="btn col-xs-12 list-group-item" style="background-color:#fff">
							<div class="col-xs-6">
								<div class="fb-like" 
									data-href="http://store.eternallynocturnal.com/products/{{$product->id}}"
									data-layout="button_count" 
									data-action="like">
								</div>
							</div>
							<div class="col-xs-6">
								<a class="btn btn-sm btn-primary" href="{{route('facebook')}}">
									<i class="fa fa-facebook-official" style="2em"></i> Ads <i class="fa fa-arrow-right"></i>
								</a>	
							</div>
						</li>
					</ul>
				</div>
		</div>
	</div>
	</div>
@stop