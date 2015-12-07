
<div class="row">
<div class="col-md-3" style="margin-top:10%">&nbsp</div>
<div class="col-md-6"  style="margin-top:10%">
<form method="POST" action="{{route('imagemanager.store')}}" enctype="multipart/form-data">
<div class="well" style="color:#000">
	<button type="button" class="btn-danger btn pull-right" style="margin-top:-15px;margin-right:-15px;" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<input type="hidden" name="type" value="show" />
<input type="file" name="file" /><br>
<div class="row">
	<div class="col-sm-12">
		<input type="checkbox" name="active" value="1" />
		Active
	</div> 
</div><br>
<div class="col-sm-12">Name</div> <input name="name" /><br>
<div class="col-sm-12">Photographer</div> <input name="photographer" /><br>
<div class="col-sm-12">Description</div> <textarea style="height:150px;" name="description"></textarea><br>
<br>
<button type="submit" class="btn btn-primary">Upload Image</button>

</form>
</div>
</div>
</div>