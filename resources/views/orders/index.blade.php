@extends('layouts.master')

@section('content')

<div style="color:#fff;margin-top:80px;" class="col-sm-6 col-xs-12">
<?php $tickettotal = 0;?>
	@foreach($ticketsales as $sale)
		@if($sale->cartsBySale->first()['product_id'] == '41')
			<?php $tickettotal += $sale->cartsBySale->first()['quantity']?> 
		@endif
	@endforeach
	<h2>
		Not Checked In: {{$tickettotal}}
	</h2>
<hr>
		<table class="table"> 
			<tr>
				<th>Name</th>
				<th>Ticket</th>
				<th>Qty</th>
			</tr>
			@foreach($ticketsales as $sale)
				@if($sale->cartsBySale->first()['product_id'] == '41')
					<tr class="table-striped">
						<td>
							{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}
						</td>
							@foreach($sale->cartsBySale as $lol)
						<td>
							{{$lol->product['name']}} 
						</td>
						<td>
							{{$lol->quantity}}
						</td>
						<td>
								<form action="{{route('eventCheckin')}}" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="sale_checkin_id" value="{{$sale->cart_id}}">
									<button type="submit" class="btn btn-success btn-xs">Check In</button>
								</form>
						</td>
							@endforeach
					</tr>
				@endif
			@endforeach
			<tr>
				<td colspan="4">
					<h3>{{$tickettotal}}</h3>
				</td>
			</tr>
	</table>
</div>

<?php $tickettotal = 0;?>
	@foreach($checkedin as $sale)
		@if($sale->cartsBySale->first()['product_id'] == '41')
			<?php $tickettotal += $sale->cartsBySale->first()['quantity']?> 
		@endif
	@endforeach
<h2>Checked In: {{$tickettotal}}</h2>
<hr>
<div class="col-sm-6 col-xs-12">

		<table class="table"> 
			<tr>
				<th>Name</th>
				<th>Ticket</th>
				<th>Qty</th>
			</tr>
			@foreach($checkedin as $sale)
				@if($sale->cartsBySale->first()['product_id'] == '41')
					<tr class="table-striped">
						<td>
							{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}
						</td>
							@foreach($sale->cartsBySale as $lol)
						<td>
							{{$lol->product['name']}} 
						</td>
						<td>
							{{$lol->quantity}}
						</td>
							@endforeach
					</tr>
				@endif
			@endforeach
			<tr>
				<td colspan="4">
					<h3>{{$tickettotal}}</h3>
				</td>
			</tr>
	</table>
</div>

<div id="orderManager">

</div>

@stop