@extends('layouts.master')

@section('content')

<div style="background-color:#fff;color:#000;padding:40px;margin-top:70px">

	<form action="{{route('productmanager.store')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="text" name="name">
		<button type="submit" class="btn btn-primary">ADD</button>
	</form>

</div>


@stop