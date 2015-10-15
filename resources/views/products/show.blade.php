@extends('layouts.master')

@section('content')
	{{$product->name}}



	<legend class="product-header-etnoc">{{$product->name}}</legend>
	<div class="col-xs-12 col-md-7">
		<img class="img-responsive" src="https://www.eternallynocturnal.com/store/public/images/products/{{$product->main_image}}" />
	</div>
	<div class="well-etnoc col-xs-12 col-md-2">
		{{$product->description}}<br>
		<input type="hidden" value="{{$product->id}}" name="product" class="product" />

		@if($product->onesize == 1)One Size Only
			<input type="hidden" value="onesize" name="size" class="size" />
			@else
			<select class="size" name="size" style="color:#000000;max-width:50%">
				@if($product->xsmall == 1 && $product->inventories->xsmall)
					<option value="xsmall">X-Small</option>
				@endif
				@if($product->small == 1 && $product->inventories->small)
					<option value="small">Small</option>
				@endif

				@if($product->medium == "1" && $product->inventories->medium)
					<option value="medium">Medium</option>
				@endif

				@if($product->large == "1" && $product->inventories->large)
					<option value="large">Large</option>
				@endif

				@if($product->xlarge == "1" && $product->inventories->xlarge)
					<option value="xlarge">X-Large</option>
				@endif

				@if($product->xxlarge == "1" && $product->inventories->xxlarge)
					<option value="xxlarge">XX-Large</option>
				@endif

				@if($product->xxxlarge == "1" && $product->inventories->xxxlarge)
					<option value="xxxlarge">XXX-Large</option>
				@endif
			</select>
		@endif	
			<br>
			<div id="checkCart"></div> 
			<br>
			<button id="cart" type="button" class="btn-xs btn-warning"><i class="fa fa-plus"></i> Add to Cart</button>
	</div>
	<div class="col-md-3"></div>
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
               		jQuery('#checkCart').append(text.quantity+" "+text.size+' Currently in your cart.<br>');
               });
               return;
            }
        });
		return false;	
	}
		
	jQuery('#cart').on('click', function(){
		var $post = {};
    	var url = "{{route('addToCart')}}";
        $post.size = jQuery(this).parent().find('.size').val(); 
        $post.product = jQuery(this).parent().find('.product').val(); 
        $post._token = "{{csrf_token()}}";
        jQuery.ajax({
        type: "POST",
        url: url,
        data: $post,
        cache: false,
        success: function(data){
           checkCart();
           return;
        }
        });
        return false;
	});
	</script>
@stop