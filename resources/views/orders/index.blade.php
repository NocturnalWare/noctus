@extends('layouts.master')
@section('content')

<div style="color:#fff;margin-top:80px;" class="col-sm-6">

	<script src="https://demo.makeros.com/js/projectwidget.js" type="text/javascript"></script>
                    <div id="create-a-makeros-project" provider-name="demo"></div>    
                
<?php $tickettotal = 0;?>
		<table class="table"> <tr>
			<th>Name</th>
			<th>Tickets</th>
			@foreach($ticketsales as $sale)
				<tr class="table-striped">
					<td>
						{{$sale->getShippingAddress()->ship_f_name}} {{$sale->getShippingAddress()->ship_l_name}}
					</td>
					<td>
						@foreach($sale->cartsBySale as $lol){{$lol->quantity}} <?php $tickettotal += $lol->quantity?> @endforeach<br>
					</td>
				</tr>
			@endforeach
	</table>
</div>
<div style="color:#fff;margin-top:80px;" class="col-sm-6">
	<h3>{{$tickettotal}}</h3>
</div>

<div id="orderManager">

</div>


@stop