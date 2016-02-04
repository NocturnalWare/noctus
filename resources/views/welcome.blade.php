@extends('layouts.master')
@section('facebook-tags')
	<meta property="og:image" content="http://54.149.181.47/images/blackskull.jpg">
@stop

@section('content')

<div class="window1">
		<div class="row">
			<div class="col-md-8 col-sm-12 en-content-box" style="max-height:650px;overflow-y:scroll">
				<h3 class="en-blog-title" style="text-align:center">Our Mission</h3>
					<p style="font-size:1.5em;text-align:center">
						Join us for our first ever Eternally Nocturnal Movie Theater Takeover!<br><br>

2/11/16 8pm<br>
Emagine Royal Oak<br>
200 N Main St, Royal Oak, MI 48067<br>
Bring your email confirmation to the show. See you there!<br>
<div class="row">
	<div class="col-sm-4">&nbsp</div>
<a  href="http://store.eternallynocturnal.com/products/39"><img class="img-responsive col-sm-4" src="http://54.149.181.47/etnoc/deadpoolwebsite.png"></a>
</div>
						<br>
						<br>
						<br>
						Here at Eternally Nocturnal we believe in dreams, we believe in passions, we believe in exploring creativity, and we believe that through such wonders, all people are drawn together.<br><br>

We are more than a clothing brand. Here at Eternally Nocturnal, we offer the greatest connection between creative individuals; we understand what it takes to live the lifestyle of a free-thinking creative mind. <br><br>

This company aims to empathize with the sleepless creative minds who will do whatever it takes to pursue the fruition of their deepest passions. <br><br>

Together we will achieve the alternative lifestyle we collectively desire. We are Eternally Nocturnal. 
<br><br>

<span style="font-size:1.4em">#StayAwakeToCreate</span>
					</p>
			</div>
			<div class="hidden-sm col-md-1" style="width:40px">&nbsp</div>
			<div class="col-md-3 col-sm-12 en-content-box" style="text-align:center;">
				<h3 class="en-blog-title" style="text-align:center">Upcoming Shows</h3>
				@include('landing.shows-carousel')
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-6 col-sm-12 en-content-box embed-responsive-16by9"style="opacity:1;text-align:center;overflow:visible;z-index:5;position:relative;">
			@include('landing.video-carousel')
		</div>
		<div class="col-md-6 col-sm-12 en-content-box embed-responsive-16by9"style="opacity:1;text-align:center;overflow:visible;z-index:5;position:relative;">
			@include('landing.featured-products-carousel')
		</div>

		<div class="col-md-6 col-sm-12" style="background-color:#000">
			<div class="col-md-4 col-sm-12">
			</div>
			<div class="col-md-4 col-sm-12">
			</div>
			<div class="col-md-4 col-sm-12">
			</div>
		</div>
	</div>
		</div>
</div>

@stop