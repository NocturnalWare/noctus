@extends('layouts.master')
@section('facebook-tags')
	<meta property="og:image" content="./images/spotlight/shapesandcolors-05-2016/headerbackground.jpg" />
    <meta property="og:description" content="Check out Eternally Nocturnal's Second Artist Spotlight Interview with Shapes and Colors" />
    <meta property="og:title" content="Eternally Nocturnal Artist Spotlight #2" />
@stop
@section('content')

		<div class="row" style="margin-top:80px;background-image: url('./images/spotlight/shapesandcolors-05-2016/headerbackground.jpg');
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
				<h3 class="en-blog-title" style="text-align:center;border-bottom:0px;">Artist Spotlight #2:</h3>
				<h1 class="en-blog-title" style="text-align:center;border-bottom:0px;">Shapes & Colors</h1>

			</div>

			<div class="col-md-offset-2 col-md-8 col-sm-12" style="background-color:#000;opacity:.9;margin-top:0px;padding-top:40px;padding-bottom:40px;">
				<img class="col-xs-12 col-sm-6 col-sm-offset-3 img-responsive" src="./images/spotlight/shapesandcolors-05-2016/shapesalbum.jpg">
					<p style="font-size:1.5em;text-align:center;" class="col-md-10 col-md-offset-1">


			We are so happy to announce that we’ve added the extremely talented dudes from Shapes & Colors to our sponsorship roster! <br><br>

			Formed in 2011, Shapes & Colors is a rising rock band from Detroit, MI. Comprising of Travis Bobier (Vocals/Guitar), Bob Allers (Bass/Vocals), Mike Morris (Guitar), Kyle Labuta (Guitar), and Scott Solomon (Drums).

			Shapes & Colors features a sound that combines rock with pop, heavy, and melodic influences to create a diverse catalog of songs. Their most recent release, On Display, was recorded by producer Aaron Sprinkle (Anberlin/The Almost/Emery) and is available <a href="{{route('bands.show', 'shapesandcolors')}}">Here</i></a>. 
			<br><br>
			Eternally Nocturnal owner Jason Putnam, got a chance to sit down with the guys and see what drives them and where they all started. 
			<br><br>
			Check out the Interview below!<br>

</div>
<div class="col-md-offset-2 col-md-8 col-sm-12">
	<iframe  style="z-index:300;" class="col-xs-offset-2 col-xs-8" width="56%" height="56%;" src="https://www.youtube.com/embed/eUUTTNHYOwg" frameborder="0" allowfullscreen></iframe>
	<div class="row" style="padding-bottom:50px;background-color:#000;opacity:.9;">&nbsp</div>
</div>

<div class="col-md-offset-2 col-md-8 col-sm-12" style="background-color:#000;margin-top:0px;">
	<div class="row">
		<div class="col-xs-12 col-md-5 col-md-offset-4">
			<img  style="z-index:300;" class="img-responsive" src="./images/spotlight/shapesandcolors-05-2016/10.jpg">
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-12 col-md-5 col-md-offset-1 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="./images/spotlight/shapesandcolors-05-2016/15.jpg">
		</div>
		<div class="col-sm-12 col-md-5 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="./images/spotlight/shapesandcolors-05-2016/2.jpg">
		</div>
	</div>
	<div class="row">&nbsp</div>
	<div class="row">
		<div class="col-sm-12 col-md-5 col-md-offset-1 col-sm-offset-1" style="position:relative;z-index:1;">
			<img  style="z-index:300;" class="img-responsive" src="./images/spotlight/shapesandcolors-05-2016/12.jpg">
		</div>
		<div class="col-sm-12 col-md-5 col-sm-offset-1">
			<img  style="z-index:300;" class="img-responsive" src="./images/spotlight/shapesandcolors-05-2016/14.jpg">
		</div>
	</div>
<div class="row" style="padding-bottom:60px;">
	<div style="text-align:center;padding-top:40px;" class"col-sm-12">
		See more and connect with Shapes & Colors at the links below:
	</div>
	<div class="col-sm-12 col-md-6 col-md-offset-4" style="padding-top:10px;">
		<a href="{{route('bands.show', 'shapesandcolors')}}"  class="col-xs-3 btn btn-lg nav-button-etnoc">
			<i style="font-size:2em;" class="fa fa-music"></i>
		</a>
	    <a target="_blank" href="https://www.instagram.com/shapescolorsmi" class="col-xs-3 btn btn-lg nav-button-etnoc">
	        <i style="font-size:2em"class="fa fa-instagram"></i>
	    </a>
	    <a target="_blank" href="https://www.facebook.com/shapesandcolorsmusic" class="col-xs-3 btn btn-lg nav-button-etnoc">
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
