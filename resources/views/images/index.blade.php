@extends('layouts.backend')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addImage">
  <i class="fa fa-plus">Add Image</i>
</button>
<!-- Modal -->
<div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-body">
      	@include('images.create')
      </div>
    </div>
  </div>

<div class="col-md-3" style="margin-top:10%">&nbsp</div>
	<div class="col-md-6"  style="margin-top:10%">
		@foreach($images['general'] as $image)
			<div class="col-sm-4">
				<img class="btn" src="{{$image->thumbnailURL()}}" data-toggle="modal" data-target="#image_{{$image->id}}">
			</div>

			<div class="modal fade" id="image_{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel" style="color:#000">{{$image->name}} - {{$image->photographer}}</h4>
			      </div>
			      <div class="modal-body">
					<img class="img-responsive" src="{{$image->imageURL()}}">
			      </div>
			      <div class="modal-footer" style="color:#000">
			      	{{$image->description}}
			      </div>
			    </div>
			  </div>
			</div>
		@endforeach
	</div>




@stop


