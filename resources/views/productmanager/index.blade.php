@extends('layouts.master')
@section('content')

<div  style="margin-top:70px;">
@foreach($products as $product)
<div class="col-xs-6 col-md-3">
	<a href="{{route('productmanager.show', $product->id)}}">
		<center>
			<img class="col-sm-12 well well-sm img-responsive" style="min-height:200px;" src="http://54.149.181.47/etnoc/{{$product->main_image}}">
			<div class="row well well-sm" style="min-height:80px;color:#000;">
				{{$product->name}}
			</div>
		</center>
	</a>
</div>
@endforeach
</div>

@stop