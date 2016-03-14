@extends('layouts.master')

@section('content')

<div style="color:#fff;margin-top:80px;" class="col-sm-6">
<?php $tickettotal = 0;?>
		<table class="table"> <tr>
			<th>Name</th>
			<th>Ticket</th>
			<th>Qty</th>
			@foreach($ticketsales as $sale)
				@if($sale->cartsBySale->first()['product_id'] == '40')
					<tr class="table-striped">
						<td>
							{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}
						</td>
							@foreach($sale->cartsBySale as $lol)
						<td>
							{{$lol->name}} 
						</td>
						<td>
							{{$lol->quantity}} <?php $tickettotal += $lol->quantity?> 
						</td>
							@endforeach<br>
					</tr>
				@endif
			@endforeach
	</table>
</div>
<div style="color:#fff;margin-top:80px;" class="col-sm-6">
	<h3>{{$tickettotal}}</h3>
</div>

<div id="orderManager">

</div>

@stop