@extends('layouts.backend')
@section('content')

	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button" href="{{route('productManager')}}">
			Product Manager<br>
			<i class="fa fa-gift" style="font-size:100px;"></i>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			Contact Manager<br>
			<i class="fa fa-users" style="font-size:100px;"></i>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-lg-4 col-sm-6">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 well well-sm en-big-well-button">
			Venue Manager<br>
			<i class="fa fa-university" style="font-size:100px;"></i>
		</div>
		<div class="col-sm-4"></div>
	</div>

<div class="col-sm-12 en-text">
<h1>Welcome to Noctus! This is the database engine that will run our primary services!</h1>


How to Slack:



<br>
</div>
@stop