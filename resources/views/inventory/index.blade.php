@extends('layouts.master')

@section('content')
<style>
.quantity{
	width: 30%;
}
</style>
<div class="col-sm-12 col-md-6">
@foreach($products as $product)
<div class="col-sm-12 col-md-4" >
	<div id="size_{{$product->id}}" class="btn-sm btn-danger">{{$product->name}}</div><br>
<script>
		var oParams = '';
var money = "{{$product->id}}";
</script>


<script>
jQuery('#size_{{$product->id}}').on('click', function(){
	jQuery(this).removeClass('btn-danger').addClass('btn-success');
	jQuery('#{{$product->id}}_quantitybut').toggleClass('hidden');
})
</script>


</div>
@endforeach
</div>

<div class="col-sm-12 col-md-6" style="background-color:#000000">
@foreach($products as $product)

	<div id="{{$product->id}}_quantitybut" class="hidden">
	<div id="size_{{$product->id}}">
		{{$product->name}}
		<button class="pull-right" onclick="closeInventory('#{{$product->id}}_quantitybut');">
			<i class="fa fa-close"></i>
		</button></div>
	<br>
	<table style="text-align:left;width:100%">
		<th>Size</th>
		<th>QOH</th>
		<th>Actions</th>
		<th>Change</th>
		<tr>

	@foreach($allsizes as $sizes)

	<td>{{studly_case($sizes)}}
	<td>
		<input type="text" onchange="jQuery('#{{$product->id}}_but').removeClass('btn-primary').addClass('btn-warning').html('Update {{$product->name}}')" style="background-color:#000000;width:60px" id="{{$sizes}}_{{$product->id}}" name="{{$sizes}}_inv" value="{{\App\Inventory::where('product_id', $product->id)->pluck($sizes)}}">
		</input>

	<td><button 
			type="button"
			class="btn-lg btn-primary quantity" 
			onclick="addInventory(
				'1', 
				'#{{$sizes}}_{{$product->id}}',
				'#{{$sizes}}_{{$product->id}}_change')">+
		</button>
		<button 
			class="btn-lg btn-primary quantity"
			type="button"
			onclick="addInventory(
					'-1', 
					'#{{$sizes}}_{{$product->id}}',
					'#{{$sizes}}_{{$product->id}}_change')"
					id="qbutton_{{$product->id}}">-</button>
	<td><span id="{{$sizes}}_{{$product->id}}_change">0</span>
	<tr>
	
	@endforeach
		<td>One Size
	<td>
		<input type="text" onchange="jQuery('#{{$product->id}}_but').removeClass('btn-primary').addClass('btn-warning').html('Update {{$product->name}}')" style="background-color:#000000;width:60px" id="onesize_{{$product->id}}" name="onesize_inv" value="{{$product->inventories->onesize}}">
		</input>

	<td><button 
			type="button"
			class="btn-lg btn-primary quantity" 
			onclick="addInventory(
				'1', 
				'#onesize_{{$product->id}}',
				'#onesize_{{$product->id}}_change')">+
		</button>
		<button 
			class="btn-lg btn-primary quantity"
			type="button"
			onclick="addInventory(
					'-1', 
					'#onesize_{{$product->id}}',
					'#onesize_{{$product->id}}_change')"
					id="qbutton_{{$product->id}}">-</button>
	<td><span id="onesize_{{$product->id}}_change">0</span>
	<tr>
	
	<tr><td colspan="4">
		<center>
			<button class="update updateButton btn btn-warning" csrf="{{csrf_token()}}" ajaxroute="{{route('inventory.update', $product->id)}}" productid="{{$product->id}}" inventoryid="{{$product->inventories->id}}" id="{{$product->id}}_but" value="{{$product->id}}" type="button">Update {{$product->name}}</button>
		</center>

</table>
<br>
<br>
<br>
	</div>

@endforeach
</div>

<script>
	
	jQuery(document).ready(function(){
        jQuery('.updateButton').on('click', function(e) {
        e.preventDefault();

            var url             = jQuery(this).attr('ajaxroute');
            var $post           = {};
            var updID 			= jQuery(this).attr('inventoryid')
            var productid 			= jQuery(this).attr('productid')
            $post.id    = updID;
            $post._token        = jQuery(this).attr('csrf');
            $post.xsmall = jQuery("#xsmall_"+updID).val();
            $post.small = jQuery("#small_"+updID).val();
            $post.medium = jQuery("#medium_"+updID).val();
            $post.large = jQuery("#large_"+updID).val();
            $post.xlarge = jQuery("#xlarge_"+updID).val();
            $post.xxlarge = jQuery("#xxlarge_"+updID).val();
            $post.xxxlarge = jQuery("#xxxlarge_"+updID).val();
            $post.onesize = jQuery("#onesize_"+updID).val();
            console.log($post);
            console.log(updID);
            console.log(url);
            jQuery.ajax({
            type: "PUT",
            url: url,
            data: $post,
	            success: function(data){
	            	jQuery('#'+data+'_but').removeClass('btn-warning').addClass('btn-success').html('Updated!');
	            	jQuery('#'+data+'_quantitybut').toggleClass('hidden');
	            	jQuery('#size_'+data).addClass('btn-primary').removeClass('btn-success');
            	}
            });

        });

     });

	function closeInventory(oParams){
		jQuery(oParams).toggleClass('hidden');
	}
	function addInventory(oParams, oDisplay, oChange){
		var newInv = parseFloat(jQuery(oChange).html())+parseFloat(oParams);
		var currentInv = jQuery(oDisplay).val();
		var futureView = parseFloat(currentInv)+parseFloat(oParams);
		jQuery(oDisplay).val(futureView);
		jQuery(oChange).html(newInv);
	}
</script>


@stop