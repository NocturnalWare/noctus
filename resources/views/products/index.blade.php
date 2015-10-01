@extends('layouts.master')

@section('content')
<div class="col-sm-12"style="background-color:#000;color:#fff;padding:20px;">
	@foreach($products as $pro)
		<center>
			<div class=" col-sm-6 col-md-4" style="border:20px solid #000;border-radius:10px;">
				<div style="width:90%">
					<label class="en-label-bl" style="background-color:#aaa;width:100%;" >{{$pro->name}} {{$pro->price}}</label><br>
					<div style="background-color:#000;">
						<img class="img-responsive" style="max-height:600px;" src="https://www.eternallynocturnal.com/store/public/images/products/{{$pro->main_image}}">
					</div>	
				</div>	
			</div>
		</center>
	@endforeach
</div>
@stop