@extends('layouts.master')

@section('content')
<div style="background-color:#fff;color:#000;padding:40px;margin-top:20px">

		<div class="row">
			<div class="col-sm-6">
				<table class="table table-striped" style="border:1px solid #999;background-color:#fff;color:#000">
					<thead>
						<tr>
							<th>Item</th>
							<th>Small</th>
							<th>Medium</th>
							<th>Large</th>
							<th>XLarge</th>
							<th>XXLarge</th>
							<th>One Size Only</th>
							<th>If Sold</th>
						</tr>
					</thead>
					<tbody>
						<?php $grandtotal = 0; ?>
						@foreach($products as $product)
							<tr>
								<?php $ifsold = 0; ?>
								<td>{{$product->name}}</td>
								@foreach(['small', 'medium', 'large', 'xlarge', 'xxlarge', 'onesize'] as $size)
									<td>{{$product->inventories[$size]}}</td>
									<?php $ifsold += $product->prices[$size] * $product->inventories[$size] ?>
								@endforeach
								<td> ${{number_format($ifsold/100, 2)}} </td>
									<?php $grandtotal += $ifsold/100;?>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		<div class="col-sm-6">
			<h1>${{number_format($grandtotal, 2)}}</h1>
		</div>
	</div>
</div>
@stop