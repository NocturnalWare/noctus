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
						<span class="col-sm-6">Ordered at {{\Carbon::parse($sale->created_at)->subHours(5)->format('m/d/Y g:i A')}}</span>
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

				<div class="row pull-right" style="margin-top:25px">
					Payment Total:
					${{number_format($sale->getShippingAddress()->cart_amt/100, 2)}}
				</div>

					<div class="row"><br><br><br>
				@if(!$sale->shippingLabel)
						<a class="col-sm-12" href="{{route('buildLabel', $sale->cart_id)}}/SmallFlatRateBox">
							<span class="btn btn-default col-md-6">Buy Small Shipping Label</span>
						</a>
						<a  class="col-sm-12" href="{{route('buildLabel', $sale->cart_id)}}/MediumFlatRateBox">
							<span class="btn btn-default col-md-6">Buy Medium Shipping Label</span>
						</a>
						<a  class="col-sm-12" href="{{route('buildLabel', $sale->cart_id)}}/LargeFlatRateBox">
							<span class="btn btn-default col-md-6">Buy Large Shipping Label</span>
						</a>
				@else
						<a class="col-md-6 btn btn-default" href="{{$sale->shippingLabel->label_url}}" target="_blank">View Shipping Label</a><br><br>
						@if($sale->getShippingAddress()->shipped_status == 'DELIVERED')
							<span class="col-sm-6">
								Delievered
								{{\Carbon::parse($sale->getShippingAddress()->updated_at)->subHours(5)->format('m/d/Y g:i A')}}
							</span>
						@else
							<a class="col-md-6 btn btn-default" href="{{route('trackPackage', $sale->cart_id)}}">Tracking</a>
						@endif
				@endif
					</div>
			</div>
		</div>
	@endforeach
</center>
@stop