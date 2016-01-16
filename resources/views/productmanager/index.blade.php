@extends('layouts.master')
@section('content')

@foreach($products as $product)
	<div class="row">
		<img class="col-sm-12 col-md-3 img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}">
		<div class="col-sm-12 col-md-8" style="color:#000">
			<div class="col-md-3"> 
				<!-- main form -->
				<form method="POST" action="{{route('productmanager.update')}}" enctype="multipart/form-data">
					<label class="col-sm-12" style="color:#fff">Item Name</label>
					<input value="{{$product->name}}" class="col-sm-12"name="name">
					<label class="col-sm-12" style="color:#fff">Category</label>
					<select class="col-sm-12" name="category" value="{{$product->category}}">
						@foreach($categories as $cat)
							<option value="{{$cat->name}}">{{$cat->name}}</option>
							@if($product->category == $cat->name)
								<option selected>{{$cat->name}}</option>
							@endif
						@endforeach
					</select>
					<label class="col-sm-12" style="color:#fff">Description</label>
					<textarea value="{{$product->description}}" class="col-sm-12" style="height:300px;">{{$product->description}}</textarea>
				</form>
			</div>
			<div style="background-color:#fff;opacity:.5;height:100%;border:15px solid #000;" class="col-md-6">

			</div>
			<div class="col-md-3"> 
				<!-- Editor Links -->
				<ul class="list-group">
					<li class="col-sm-12">
						<a class="btn btn-primary" style="width:100%" href="{{route('facebook')}}">
							<i class="fa fa-facebook-official" style="2em"></i>
						</a>
					</li>
			</div>
		</div>
	</div>
@endforeach

@stop