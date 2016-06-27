@extends('layouts.master')

@section('content')

<div class="col-xs-12" style="padding:80px">Contestants</div>
	@foreach($contestants as $contestant)
		<div class="col-sm-12 btn" style="padding-left:50px">
			<span class="col-sm-3">{{$contestant->contestant}}</span>
			<span class="col-sm-3">{{$contestant->invites}}</span>
			<span class="col-sm-3">Winning Numbers: {{$contestant->win_min}} - {{$contestant->win_max}}</span>
			@if($winner > $contestant->win_min && $winner < $contestant->win_max)
				<span class="btn btn-danger col-sm-3">Winner!!!! {{$contestant->contestant}} With {{$winner}}</span>
			@endif
		</div>

	@endforeach
</div>


@stop