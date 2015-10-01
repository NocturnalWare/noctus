@extends('layouts.master')

@section('content')
<div class="col-sm-12" style="background-color:#000;color:#fff">
	@foreach($products as $pro)
		<center>
			<div class=" col-sm-6 col-md-4 well well-sm" >
				<label class="en-label-bl">{{$pro->name}} {{$pro->price}}</label><br>
				<div style="background-color:#000;">
					<img class="img-responsive" style="max-height:600px;margin-left:5%" src="https://www.eternallynocturnal.com/store/public/images/products/{{$pro->main_image}}">
				</div>	
			</div>
		</center>
	@endforeach
</div>
@stop