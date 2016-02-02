@extends('layouts.master')
@section('content')

<div style="color:#fff;margin-top:80px;" class="col-sm-6">
<?php $tickettotal = 0;?>
	@foreach($ticketsales as $sale)
	<div class="col-sm-12">
		<div class="col-sm-6">
			{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}
		</div>
		<div class="col-sm-2">
			@foreach($sale->cartsBySale as $lol){{$lol->quantity}} <?php $tickettotal += $lol->quantity?> @endforeach<br>
		</div>
	</div>
	@endforeach
</div>
<div style="color:#fff;margin-top:80px;" class="col-sm-6">
	<h3>{{$tickettotal}}</h3>
</div>

<div id="orderManager">

</div>


@stop