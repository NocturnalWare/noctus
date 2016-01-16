@extends('layouts.backend')
@section('content')

@foreach($products as $product)
	<div class="row">
		<img class="col-sm-12 col-md-3 img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}">
		<div class="col-sm-12 col-md-8" style="color:#000">
			<form method="POST" action="{{route('productmanager.update')}}" enctype="multipart/form-data">

				<label class="col-sm-12" style="color:#fff">Item Name</label>
				<input value="{{$product->name}}" class="col-sm-12 col-md-3"name="name">
				<label class="col-sm-12" style="color:#fff">Category</label>
				<select class="col-sm-12 col-md-3" name="category" value="{{$product->category}}">
					@foreach($categories as $cat)
						<option value="{{$cat->name}}">{{$cat->name}}</option>
						@if($product->category == $cat->name)
							<option selected>{{$cat->name}}</option>
						@endif
					@endforeach
				</select>
				<label class="col-sm-12" style="color:#fff">Description</label>
				<textarea value="{{$product->description}}" class="col-sm-12 col-md-3" style="height:300px;">{{$product->description}}</textarea>
		</div>
	</div>
@endforeach

@stop