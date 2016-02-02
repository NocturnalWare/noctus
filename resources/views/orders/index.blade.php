@extends('layouts.master')
@section('content')

<div style="color:#fff;margin-top:80px;">

	@foreach($ticketsales as $sale)
		{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}} || @foreach($sale->cartsBySale as $lol){{$lol->quantity}}@endforeach<br>
	@endforeach
</div>


<div id="orderManager">

</div>


@stop