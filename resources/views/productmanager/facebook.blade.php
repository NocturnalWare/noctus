@extends('layouts.backend')



@section('content')

		<img class="col-sm-12 col-md-3 img-responsive" src="http://54.149.181.47/etnoc/{{$product->main_image}}">

	<i class="fa fa-facebook-official" style="font-size:2em"></i> Main Image
	<div class="well" style="color:#000">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<input type="hidden" name="type" value="show" />
		<input type="file" name="file" />
		<div class="col-sm-3">Active</div> <input type="checkbox" name="active" value="1" /><br><br>
		<div class="col-sm-3">Name</div> <input name="name" /><br>
		<div class="col-sm-3">Photographer</div> <input name="photographer" /><br>
		<div class="col-sm-3">Description</div> <textarea style="height:150px;" name="description"></textarea><br>
		<br>
		<button type="submit" class="btn btn-primary">Update Facebook Image</button>

		</form>


@stop