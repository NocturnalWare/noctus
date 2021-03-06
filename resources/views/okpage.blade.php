@extends('layouts.backend')
@section('content')

	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('productManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Product Manager</label><br>
				<i class="fa fa-gift" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('contactManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Contact Manager</label><br>
				<i class="fa fa-users" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('venueManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Venue Manager</label><br>
				<i class="fa fa-university" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('venueManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Order Manager</label><br>
				<i class="fa fa-credit-card" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('venueManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Band Manager</label><br>
				<i class="fa fa-music" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('venueManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Shipping Manager</label><br>
				<i class="fa fa-truck" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			<a href="{{route('venueManager')}}" class="en-big-well-button">
				<label class="en-label-bl">Show Manager</label><br>
				<i class="fa fa-magic" style="font-size:100px;"></i>
			</a>
		</div>
		<div class="col-sm-4"></div>
	</div>

<div class="col-sm-12 en-text">
<h1>Welcome to Noctus! This is the database engine that will run our primary services! (soon)</h1>


<h1 style="color:#fff">How to Slack:</h1>
<br>
Login:<br>
email@eternallynocturnal.com<br>
Your Password.<br>

<a href="https://etnoc.slack.com"> 
<button class="btn btn-primary">Click here to go to login.</button>
</a>



</div>
@stop