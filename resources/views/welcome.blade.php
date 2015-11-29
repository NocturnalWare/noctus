@extends('layouts.master')
@section('content')
<div class="window1">
		<div class="col-md-8 col-sm-12 en-content-box">
			<h3 class="en-blog-title" style="text-align:center">Site Update</h3>
				<p style="font-size:1.2em;text-align:center">
					Last year immediately after Putnam's Halloween, we launched our website with lofty goals in mind 
					
					<br><br>it looked like crap.<br><br>

					A few weeks later we moved to our "Dusk" theme because we had to prepare for nightfall.

					<br><br>it looked a bit less like crap.<br><br>

					 We hope you like the new look -- we're going to be bringing even more art and events along with our new clothing line.

					<br><br>

					Thanks for sticking around,
					<br><br>
						<center>
							<img height="10%" class="img-responsive" src="https://www.eternallynocturnal.com/images/mainenheader.png" />
						</center>
				</p>
		</div>
		<div class="hidden-sm col-md-1" style="width:40px">&nbsp</div>
		<div class="col-md-3 col-sm-12 en-content-box" style="text-align:center;height:100%;max-height:400px;">
			<h3 class="en-blog-title" style="text-align:center">Upcoming Shows:</h3>
			PUTNAMS HALLOWEEN Friday 10/16<br>
		</div>
		
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

@stop