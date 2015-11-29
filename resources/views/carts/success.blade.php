@extends('layouts.master')

@section('content')
<div style="margin-top:10%;width:50%;margin-left:25%;color:#000;text-align:center" class="well col-sm-12">
<h1>Thank you!</h2>


	We <b>really</b> appreciate your business and hope you check back soon for new products!<br>

	We support local music! Check out our sponsored bands!

</div>

<div class="col-sm-12">
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'storiesuntold')}}" ><img src="https://www.eternallynocturnal.com/images/storiesuntold.jpg" class="img-responsive"></a>
	</div>
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'adventurer')}}" ><img src="https://www.eternallynocturnal.com/images/adventurer.png" class="img-responsive"></a>
	</div>
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'theillustrator')}}" ><img src="https://www.eternallynocturnal.com/images/theillustrator.jpg" class="img-responsive"></a>
	</div>


@stop



