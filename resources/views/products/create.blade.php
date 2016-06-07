@extends('layouts.master')

@section('content')

<div id="newProduct" class="row" route="{{route('productmanager.store')}}" token="{{csrf_token()}}" style="background-color:#fff;color:#000;padding:40px;margin-top:70px">
		<h3>New Product<h3>
		<div class="col-sm-7 col-xs-12 row">
			<input type="text" class="form-control" v-model="product.name" placeholder="Product Name">
		</div>
		<div class="col-sm-7 col-xs-12 row">
			<textarea class="form-control" v-model="product.description" placeholder="Description"></textarea>
		</div>
		<div class="col-sm-7 col-xs-12 row">
			<select v-model="product.category" class="form-control">
				<option value="Tees" selected>Category</option> 
				<option v-for="category in categories" value="@{{category}}">@{{category}}</option>
			</select>
		</div>
		<div class="col-sm-7 col-xs-12 row">
			<input type="text" class="form-control" v-model="product.price" placeholder="Display Price (19.99 - 24.99)">
		</div>

		<hr class="col-xs-12">

		<h3 class="col-xs-12">Inventory & Prices</h3>
		<table class="table table-striped table-hover" style="color:#000">
			<thead>
				<tr>
					<th>Size</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						X-small
					</td>
					<td>
						<input type="text" v-model="inventory.xsmall">
					</td>
					<td>
						<input type="text" v-model="price.xsmall">
					</td>
				</tr>
				<tr>
					<td>
						Small
					</td>
					<td>
						<input type="text" v-model="inventory.small">
					</td>
					<td>
						<input type="text" v-model="price.small">
					</td>
				</tr>
				<tr>
					<td>
						Medium
					</td>
					<td>
						<input type="text" v-model="inventory.medium">
					</td>
					<td>
						<input type="text" v-model="price.medium">
					</td>
				</tr>
				<tr>
					<td>
						Large
					</td>
					<td>
						<input type="text" v-model="inventory.large">
					</td>
					<td>
						<input type="text" v-model="price.large">
					</td>
				</tr>
				<tr>
					<td>
						X-Large
					</td>
					<td>
						<input type="text" v-model="inventory.xlarge">
					</td>
					<td>
						<input type="text" v-model="price.xlarge">
					</td>
				</tr>
				<tr>
					<td>
						XX-Large
					</td>
					<td>
						<input type="text" v-model="inventory.xxlarge">
					</td>
					<td>
						<input type="text" v-model="price.xxlarge">
					</td>
				</tr>
				<tr>
					<td>
						XXX-Large
					</td>
					<td>
						<input type="text" v-model="inventory.xxxlarge">
					</td>
					<td>
						<input type="text" v-model="price.xxxlarge">
					</td>
				</tr>

			</tbody>

	<span @click="addProduct" class="btn btn-warning"> Do the Thing</span>
</div>
@stop