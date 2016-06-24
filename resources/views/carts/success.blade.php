@extends('layouts.master')

@section('content')
<div class="col-md-3">&nbsp</div>
<div style="margin-top:140px;color:#000;text-align:center" class="well well-sm col-sm-12 col-md-6">
<h1>Thank you!</h2>


	We <b>really</b> appreciate your business and hope you check back soon for new products!<br>

	We support local music! Check out our sponsored bands!

</div>

<div class="col-sm-12">
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'storiesuntold')}}" ><img src="https://eternallynocturnal.com/images/storiesuntold.jpg" class="img-responsive"></a>
	</div>
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'adventurer')}}" ><img src="https://eternallynocturnal.com/images/adventurer.jpg" class="img-responsive"></a>
	</div>
	<div class="col-sm-12 col-md-4">
		<a href="{{route('bands.show', 'theillustrator')}}" ><img src="https://eternallynocturnal.com/images/theillustrator.jpg" class="img-responsive"></a>
	</div>


@stop



