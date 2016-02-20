@extends('layouts.master')
@section('facebook-tags')
	<meta property="og:image" content="http://54.149.181.47/etnoc/banshee/bansheehead.PNG" />
    <meta property="og:description" content="Check out Eternally Nocturnal's First Artist Spotlight Interview with The Banshee Pilot" />
    <meta property="og:title" content="Eternally Nocturnal Artist Spotlight #1" />
@stop
@section('content')

		<div class="row" style="margin-top:80px;background-image: url('http://54.149.181.47/etnoc/banshee/banshee-group2.jpg');
		    background-position: center;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    background-repeat: no-repeat;
    height:100%;
    position:fixed;
    overflow-y: scroll;
    width:104%;
    background-color:none;
    padding:10px;">
			<div class="col-md-offset-2 col-md-8 col-sm-12" style="background-color:#000;opacity:.996">
				<h3 class="en-blog-title" style="text-align:center;border-bottom:0px;">Artist Spotlight #1:</h3>
				<h1 class="en-blog-title" style="text-align:center;border-bottom:0px;">The Banshee Pilot</h1>

				<img class="col-sm-12 img-responsive" src="http://54.149.181.47/etnoc/banshee/bansheehead.PNG">
			</div>

			<div class="col-md-offset-2 col-md-8 col-sm-12" style="background-color:#000;opacity:.9;margin-top:0px;padding-top:40px;padding-bottom:40px;">
					<p style="font-size:1.5em;text-align:center;" class="col-md-10 col-md-offset-1">


	We’re excited to announce our new Eternally Nocturnal sponsored band, The Banshee Pilot!<br><br>
	These dudes are good friends of ours and they are extremely talented musicians.
	Self-described as an Alternative concept rock band rising from the post-apocalyptic remains of Detroit, 
	The Banshee Pilot offers an unrivaled sound and even better theatrics. 
	We love to work with truly unique and hard working bands, so Banshee was an obvious choice. 
<br><br>
	Our owner Jason Putnam sat down with The Banshee Pilot and asked them the tough questions about their origin and inspiration, followed by the not-so-tough questions. 
<br><br>
	Check out the interview below! <br>


</div>
<div class="col-md-offset-2 col-md-8 col-sm-12">
	<iframe  style="z-index:300;" class="col-xs-offset-2 col-xs-8" width="56%" height="56%;" src="https://www.youtube.com/embed/OukL4GLWhiE" frameborder="0" allowfullscreen></iframe>
	<div class="row" style="padding-bottom:50px;background-color:#000;opacity:.9;">&nbsp</div>
</div>

<div class="col-md-offset-2 col-md-8 col-sm-12" style="background-color:#000;margin-top:0px;">
	<div class="row">
		<div class="col-sm-12 col-md-5 col-md-offset-1 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="http://54.149.181.47/etnoc/banshee/Nick.jpg">
		</div>
		<div class="col-sm-12 col-md-5 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="http://54.149.181.47/etnoc/banshee/Gage.jpg">
		</div>
	</div>
	<div class="row">&nbsp</div>
	<div class="row">
		<div class="col-sm-12 col-md-5 col-md-offset-1 col-sm-offset-1" style="position:relative;z-index:1;">
			<img  style="z-index:300;" class="img-responsive" src="http://54.149.181.47/etnoc/banshee/Brandan.jpg">
		</div>
		<div class="col-sm-12 col-md-5 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="http://54.149.181.47/etnoc/banshee/Anthony.jpg">
		</div>
	</div>
<div class="row" style="padding-bottom:60px;">
	<div style="text-align:center;padding-top:40px;" class"col-sm-12">
		See more and connect with The Banshee Pilot at the links below:
	</div>
	<div class="col-sm-12 col-md-6 col-md-offset-3" style="padding-top:10px;">
		<a href="{{route('bands.show', 'thebansheepilot')}}"  class="col-xs-3 btn btn-lg nav-button-etnoc">
			<i style="font-size:2em;" class="fa fa-music"></i>
		</a>
	    <a target="_blank" href="https://twitter.com/thebansheepilot" class="col-xs-3 btn btn-lg nav-button-etnoc">
	        <i style="font-size:2em"class="fa fa-twitter"></i>
	    </a>
	    <a target="_blank" href="https://www.instagram.com/thebansheepilot/" class="col-xs-3 btn btn-lg nav-button-etnoc">
	        <i style="font-size:2em"class="fa fa-instagram"></i>
	    </a>
	    <a target="_blank" href="https://www.facebook.com/thebansheepilotofficial/" class="col-xs-3 btn btn-lg nav-button-etnoc">
	        <i style="font-size:2em"class="fa fa-facebook-official"></i>
	    </a>
	</div>
</div>
</div>
<div class="row">
</div>
<div style="height:2400px">&nbsp
</div>
</div>
@stop
