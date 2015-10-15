@extends('layouts.master')

@section('content')
<?php $pricetag = 0;?>
	@foreach($carts as $cart)
		
		<div class="row" style="margin-top:70px;margin-left:40px;width:80%;border:1px #ffffff solid;border-radius:35px;border-left:transparent;border-right:transparent;padding:15px;">
				<div class="col-xs-12 col-md-3">
					<center>
						<img  style="height:100px" class="img-responsive" src="https://www.eternallynocturnal.com/store/public/images/products/{{$cart->findItemProp('main_image')}}" />
					</center>
				</div>
				<div class="col-xs-12 col-md-3">
					{{$cart->findItemProp('Name')}}<br>
				</div>
				<div class="col-xs-4 col-md-2">
					{{studly_case($cart->size)}}
				</div>
				<div class="col-xs-4 col-md-2">
					{{$cart->quantity}}
				</div>
				<div class="col-xs-4 col-md-2">
					<div class="col-xs-6">
						${{substr($cart->checkoutPrice(),0, -2)}}.{{substr($cart->checkoutPrice(),-2)}}
					</div>
					<div class="col-xs-6">
						<form action="{{route('removeFromCart')}}" method="post">
							<input type="hidden" name="product" value="{{$cart->id}}" />
							<input type="hidden" name="_token" value="{{csrf_token()}}">

							<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
						</form>
					
					</div>
				</div>
				
		</div>

			<?php $pricetag = $pricetag + $cart->checkoutPrice();?>

	@endforeach

@if($pricetag > 0)
<div class="col-xs-9" style="text-align:right;">
<div style="color:#f0f0f0;font-size:16px">Item total: ${{substr($pricetag,0,-2)}}.{{substr($pricetag,-2)}}</div>

<?php 
	$shipcounter = $carts->sum('quantity');
	if($shipcounter > 1){
		$shipcost = round((($shipcounter / 2) * 599),0);
	}else{
		$shipcost = 599;
	}
	$pricetag = $pricetag + $shipcost;
?>

<div style="color:#f0f0f0;font-size:16px">Shipping total: ${{substr($shipcost,0,-2)}}.{{substr($shipcost,-2)}}</div>
<form action="{{route('cart.index')}}" method="post">
<input type="hidden" name="checkoutAmt" value="{{$pricetag}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<button type="submit" class="btn btn-sm btn-primary">${{substr($pricetag,0,-2)}}.{{substr($pricetag,-2)}}<br>Check Out</button>

</form>

<br><br>

<form action="{{route('emptyCart')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit" class="btn btn-danger btn-xs" style="border-radius:35px;background-color:#700000">Empty Cart</button>
</form>
</div>

@else
<div style="min-height:800px">
THERE DOESNT SEEM TO BE ANYTHING IN YOUR CARTE! SHOPPE HARDER!

@endif


@stop