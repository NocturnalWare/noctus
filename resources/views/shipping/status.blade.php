@extends('layouts.master')

@section('content')
<div style="background-color:#000;margin-top:140px;">
	<div class="row" style="color:#000">
		<div class="col-md-3">&nbsp</div>
			<div class="col-sm-12 col-md-6 well">
			<span class="pull-left"><label>Status: </label></span>
			<span class="pull-right">{{studly_case($check->status)}}</span><br>
			<br>

			<span class="pull-left"><label>USPS Tracking Code: </label></span>
			<span class="pull-right">{{$check->tracking_code}}</span><br>
				<iframe style="width:100%;height:600px;" src="https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1={{$check->tracking_code}}">
			<br>
			<br>
			<span class="pull-left"><label>Estimated Delivery: </label></span>
			<span class="pull-right">{{studly_case($check->est_delivery_date)}}</span><br>
		</div>
	</div>
</div>
@stop