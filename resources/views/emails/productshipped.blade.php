<div style="background-color:#000;color:#fff;">
	<img src="https://www.eternallynocturnal.com/images/mailBanner.jpg">
	<div style="display:flex">
		<div style="width:50%;margin-left:18%;color:#000;background-color:#aaa;border-radius:25px;max-height:100%;padding:15px;">
			<table style="margin-left:10%;width:90%">
				<th style="text-align:left;">SHIPPING TO:</th><tr>
				<td>{{$customer->ship_f_name}} {{$customer->ship_l_name}}<br>
				{{$customer->ship_address1}} {{$customer->ship_address2}}<br>
				{{$customer->ship_city}} {{$customer->ship_state}}, {{$customer->ship_zip}}<br><br>
			</table>

			<table width="90%" style="text-align:center;border-bottom:1px solid #000;">

				<th style="width:60%;"><label>Item</label></th>
				<th style="width:20%;"><label>Quantity</label></th>
				<th style="width:20%;"><label>Size</label></th>
			</table>

			<table width="90%" style="border-bottom:1px solid #000;text-align:center">
				@foreach($cart as $items)

					<td style="width:60%;">{{$items->findItemProp('Name')}}	
					<td style="width:20%;">{{$items->quantity}}
					<td style="width:20%;">@if($items->size == 'onesize')One Size Only @else{{studly_case($items->size)}}@endif
					<tr>

				@endforeach
			</table>
			<br><br>
			<div style="text-align:center">
				<h3>THANK YOU!</h3>

				We really appreciate your business! <br><br>

				Your product(s) will be shipped out soon, we'll send you another email with a tracking number when it's on the way!<br><br><br>
			</div>
		</div>
	</div>
	<br><br><br><br>
</div>