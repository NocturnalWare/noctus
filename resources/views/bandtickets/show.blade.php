@extends('layouts.master')
@section('facebook-tags')
          <meta property="og:image" content="http://54.149.181.47/etnoc/tickets/{{$ticket->main_image}}" />
          <meta property="og:description" content="{{$product->description}}" />
          <meta property="og:title" content="{{$ticket->band_name}}" />
@stop
@section('content')





<center>
									
	<legend style="margin-top:70px;text-align:center;color:#fff" class="product-header-etnoc">{{$ticket->band_name}}</legend>
	<div class="col-xs-12 col-md-7">
		<img class="img-responsive" src="http://54.149.181.47/etnoc/tickets/{{$ticket->main_image}}" />
	</div>
	<div class="well col-xs-12 col-md-2" style="color:#000;">
		{{$product->description}}
		<br><br>
		<input type="hidden" name="band_name" class="band_name" value="{{$ticket->band_name}}">
		<input type="hidden" value="{{$product->id}}" name="product" class="product" />



			<div id="checkCart"></div> 
			<br>
			@if($product->id !== 49)
				<button id="cart" type="button" class="col-sm-12 btn btn-sm btn-default"><i class="fa fa-plus"></i> Add to Cart</button>
			@else
				<h3> This item is sold out :( </h3>
			@endif
				<br><br>
			<a href="{{route('cart.index')}}" class="col-sm-12 btn btn-sm btn-default"><i class="fa fa-shopping-cart"></i> View Cart</a>
			<div class="row">
				<div class="col-sm-6 btn" style="color:transparent">
					<div class="fb-like" 
						data-href="http://store.eternallynocturnal.com/products/{{$product->id}}"
						data-layout="button_count" 
						data-action="like">
					</div>
				</div>
				<div class="col-sm-6 btn">
					<div>
						<div class="fb-share-button" data-href="http://store.eternallynocturnal.com/products/{{$product->id}}" data-layout="button"></div>
					</div>
				</div>
			</div>
	</div>


	<script>
	checkCart();
	function checkCart(){
		var $post = {};
        var url = "{{route('checkCart')}}";
        $post.product = jQuery(".product:first").val();
        $post._token = "{{csrf_token()}}";
        jQuery.ajax({
            type: "POST",
            data: $post,
            url: url,
            cache: false,
            success: function(data){
				jQuery('#checkCart').html('');
				jQuery.each(data, function(val, text){
					if(text.size == 'onesize'){
						jQuery('#checkCart').append(text.quantity+' Currently in your cart.<br>');
					}else{
						jQuery('#checkCart').append(text.quantity+" "+text.size+' Currently in your cart.<br>');
					}
				});
				if(data > ''){
					jQuery('#showCartIcon').removeClass('hidden');
					jQuery('#hideCartIcon').addClass('hidden');					
				}
               return;
            }
        });
		return false;	
	}

		
	jQuery('#cart').on('click', function(){
		var $post = {};
    	var url = "{{route('addTicketToCart')}}";
        $post.product = jQuery(this).parent().find('.product').val(); 
        $post.band_name = jQuery(".band_name:first").val();
        $post._token = "{{csrf_token()}}";
        jQuery.ajax({
        type: "POST",
        url: url,
        data: $post,
        cache: false,
        success: function(data){            	

            	if(data['failure']){
            		return jQuery('#checkCart').append(data['failure']+'<br>');
            	}

			jQuery('.ajaxCart').html(data);
           	checkCart();
           	return;
        }
        });
        return false;
	});
	</script>

@stop