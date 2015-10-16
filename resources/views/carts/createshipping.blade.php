@extends('layouts.master')
@section('content')
<h2>{{$errors->first()}}</h2>
<div style="background-color:#000;margin-top:70px;">


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





<form action="" method="">
	<div class="col-xs-12 col-lg-12">
		<div class="col-sm-6 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Email Address*</label>
			</div>
			<div class="col-md-6">
				<input type="text" name='email' placeholder='Email' />
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Password <i style="font-size:10px">for returning visits</i></label>
			</div>
			<div class="col-md-6">
				<input type="text" name='password' placeholder='Password' />
			</div>
		</div>



		<div class="col-xs-12 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Phone</label>
			</div>
			<div class="col-md-6">
				<input type="text" name='phone' placeholder='Phone Number' />
			</div>
		</div>


	
	
	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">First Name*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_f_name' placeholder='First Name' />
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Last Name*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_l_name' placeholder='Last Name' />
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Address*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_address1' placeholder='Address 1' />
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Address 2</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_address2' placeholder='Address 2' />
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">City*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_city' placeholder='City' />
		</div>
	</div>

	<div class="col-xs-12 col-md-4" style="color:#000000">
		<div class="col-md-6">
			<label style="color:#ffffff">State*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_state' placeholder='State' />
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Zip*</label>
		</div>
		<div class="col-md-6">
			<input type="text" name='ship_zip' placeholder='Zip' />
		</div>
	</div>
	</div>
<br><br>
<div class="row" style="text-align:center">
@if(session('checkoutAmt'))
<input type="hidden" name="cart_id" value="{{session('cart_id')}}" />
<input type="hidden" name="cart_amt" value="{{session('checkoutAmt')}}" />
<h2 style="color:#f0f0f0">Total with shipping: ${{substr(session('checkoutAmt'),0,-2)}}.{{substr(session('checkoutAmt'),-2)}}</h2>
@endif

<button type="submit" style="border-radius:45px" class="button alert small">Check Out</button>
</form>
</div>

</center>

@stop