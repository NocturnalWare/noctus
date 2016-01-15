@extends('layouts.master')

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="col-sm-12"style="background-color:#000;color:#fff;padding:20px;">
	@foreach($products as $pro)
		@if($pro->inventories->checkStock() !== 0)
		




			<center>
				<a href="{{route('products.show', $pro->id)}}">
					<div class=" col-sm-6 col-md-4" style="border:20px solid #000;border-radius:10px;">
						<div style="width:90%">
							<div style="background-color:#000;">
								<img class="img-responsive" style="max-height:600px;" src="http://54.149.181.47/etnoc/{{$pro->main_image}}">
							</div>	
							<label class="en-label-bl" style="background-color:#aaa;width:100%;">{{$pro->name}} ${{$pro->price}} 
								@if(Auth::check())
									<div class="fb-share-button" data-href="http://store.eternallynocturnal.com/products/{{$pro->id}}" data-layout="button"></div>
								@endif
							</label><br>
						</div>	
					</div>
				</a>
			</center>
		@endif
	@endforeach
</div>
@stop