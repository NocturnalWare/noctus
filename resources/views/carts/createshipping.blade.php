@extends('layouts.master')
@section('content')
<h2>{{$errors->first()}}</h2>
<div style="background-color:#000;margin-top:10%;">


<!-- <form action="" method="">
<div class="col-xs-12">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<input type="text" name='email' placeholder='Email' />
</div>
	
<div class="col-xs-12">
	<input type="password" name='password' placeholder='Password' />
</div>
		<button class="button tiny alert" type="submit">Use Email</button>
</form> -->

<h1 style="color:#fff;text-align:center">Shipping Information</h1>

<div class="col-sm-12 well" style="width:50%;margin-left:25%">

<form action="{{route('addShipping')}}" style="color:#000" method="POST">
	<div class="col-xs-12 col-lg-12">
		<div class="col-sm-6 col-md-12">
			<div class="col-md-6">
				<label>Email Address*</label>
			</div>
			<div class="col-md-6">
				<input type="text" name='email' ship-required="8" class="shippingRequiredInput" value="{{$shipping->email}}" placeholder='Email' />
			</div>
		</div>
		
		<div class="col-sm-6 col-md-12">
			<div class="col-md-6">
				<label>Password <i style="font-size:10px">for returning visits</i></label>
			</div>
			<div class="col-md-6">
				<input type="text" name='password' placeholder='Password' />
			</div>
		</div>



		<div class="col-xs-12 col-md-12">
			<div class="col-md-6">
				<label>Phone</label>
			</div>
			<div class="col-md-6">
				<input type="text" name='phone' value="{{$shipping->phone}}" placeholder='Phone Number' />
			</div>
		</div>


	
	
	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>First Name*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_f_name' ship-required="3" class="shippingRequiredInput" value="{{$shipping->ship_f_name}}" placeholder='First Name' />
		</div>
	</div>
	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>Last Name*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_l_name' ship-required="3" class="shippingRequiredInput" value="{{$shipping->ship_l_name}}" placeholder='Last Name' />
		</div>
	</div>

	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>Address*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_address1' ship-required="2" class="shippingRequiredInput" value="{{$shipping->ship_address1}}" placeholder='Address 1' />
		</div>
	</div>

	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>Address 2</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_address2' value="{{$shipping->ship_address_2}}" placeholder='Address 2' />
		</div>
	</div>

	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>City*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_city' ship-required="2" class="shippingRequiredInput" value="{{$shipping->ship_city}}" placeholder='City' />
		</div>
	</div>

	<div class="col-xs-12 col-md-12" style="color:#000000">
		<div class="col-md-6">
			<label>State*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_state' ship-required="2" class="shippingRequiredInput" value="{{$shipping->ship_state}}" placeholder='State' />
		</div>
	</div>

	<div class="col-xs-12 col-md-12">
		<div class="col-md-6">
			<label>Zip*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_zip' ship-required="5" class="shippingRequiredInput" value="{{$shipping->ship_zip}}" placeholder='Zip' />
		</div>
	</div>
	</div>
<br><br>
<div class="row" style="text-align:center">
@if(session('checkoutAmt'))
<input type="hidden" name="cart_id" value="{{session('cart_id')}}" />
<input type="hidden" name="cart_amt" value="{{session('checkoutAmt')}}" />
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<h2 style="color:#f0f0f0">Total including shipping: ${{substr(session('checkoutAmt'),0,-2)}}.{{substr(session('checkoutAmt'),-2)}}</h2>
@endif

<span id="checkoutPlaceholder"><i class="fa fa-spinner fa-spin"></i> Please fill in all required fields to continue...</span>
<button type="submit" id="checkoutButton" style="border-radius:45px" class="hidden btn btn-primary">Check Out</button>
</form>
</div>
</div>

</center>
<script>
	var required = 7;
	jQuery(document).ready(function(){
		checkRequired();
		
		jQuery('.shippingRequiredInput').on('change', function(){
			checkRequired();
		}).on('keyup', function(){
			checkRequired();
		});

		function checkRequired(){
			var counter = 0;
			jQuery('.shippingRequiredInput').each(function(){
				if(jQuery(this).val() > '' && jQuery(this).val().length >= jQuery(this).attr('ship-required')){
					counter += 1;
				}
				if(counter == required){
					jQuery('#checkoutButton').removeClass('hidden');
					jQuery('#checkoutPlaceholder').addClass('hidden');
				}else{
					jQuery('#checkoutPlaceholder').removeClass('hidden');
					jQuery('#checkoutButton').addClass('hidden');
				}
			});
		}
	})
</script>
@stop