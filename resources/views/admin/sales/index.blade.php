@extends('layouts.backend')

@section('content')
<center>
	@foreach($sales as $sale)
		<div class="col-sm-12 col-md-6" style="color:#000;max-height:500px">
			<div class="well" style="height:500px;width:90%">
				<div class="row">
					<h4 style="text-align:center;">
						<a href="mailto:{{$sale->customer_id}}">
							<span class="col-sm-6">{{$sale->customer_id}}</span>
						</a>
						<span class="col-sm-6">{{\Carbon::parse($sale->created_at)->format('d/m/Y h:mA')}}</span>
					</h4>
				</div>
					<div class="row" style="margin:25px">
						<div class="col-sm-6">
							{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}<br>
							{{$sale->getShippingAddress()->ship_address1}} {{$sale->getShippingAddress()->ship_address2}}<br>
							{{$sale->getShippingAddress()->ship_city}} {{$sale->getShippingAddress()->ship_state}} {{$sale->getShippingAddress()->ship_zip}} <br>
							<a href="tel:{{$sale->getShippingAddress()->phone}}"><i class="fa fa-phone"></i> {{$sale->getShippingAddress()->phone}}</a>
						</div>
					</div>

				<div class="row" style="border-bottom:3px solid #000;text-align:left">
					<div class="col-sm-4">
						Product 
					</div>
					<div class="col-sm-4">
						Size
					</div>
					<div class="col-sm-4">
						Quantity
					</div>
				</div>
				
				@foreach($sale->cartsBySale as $cart)
					<div class="row" style="text-align:left">
						<div class="col-sm-4">
							{{$cart->product['name']}}<br>
						</div>
						<div class="col-sm-4">
							{{studly_case($cart->size)}}<br>
						</div>
						<div class="col-sm-4">
							{{studly_case($cart->quantity)}}<br>
						</div>
					</div>
				@endforeach

				<span class="pull-right" style="margin-top:25px">
					Payment Total:
					${{number_format($sale->getShippingAddress()->cart_amt/100, 2)}}
				</span>
			</div>
		</div>
	@endforeach
</center>
@stop