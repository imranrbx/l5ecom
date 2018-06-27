@extends('admin.app')
@section('content')
<div class="row">
	<div class="col-md-9">
		<form>
			<div class="form-group row align-items-center">
				
				<div class="col-sm-12">
					<input type="email" class="form-control" name="title" id="inputTitle" placeholder="Title" />
					<p class="alert-info">{{config('app.url')}}<input type='text' name="slug" id="durl" clas="form-control" placeholder="/" /></p>
				</div>
			</div>
			<div class="form-group row">
				
				<div class="col-sm-12">
					<textarea class="form-control" id="inputContent" name="body" rows="10" cols="80"></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item active">Publish</li>
				<li class="list-group-item">
					<div class="form-group row align-items-center">
						<label for="status" class="col-sm-2 form-control-label">Status: </label>
						<div class="col-sm-10">
							<select name="status" id="status" class="form-control">
								<option value="" selected>Pending</option>
								<option value="" selected>Publish</option>
								<option value="" selected>Draft</option>
								option
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary float-right">Save</button>
						</div>
					</div>
				</li>
				<li class="list-group-item active">Featured Image</li>
				<li class="list-group-item">Porta ac consectetur ac</li>
				<li class="list-group-item active">Select Category</li>
				<li class="list-group-item">
					<select name="category" multiple class="form-control">
						<option value="">Category 01</option>
						<option value="">Category 02</option>
						<option value="">Category 03</option>
						option
					</select>
				</li>
			</ul>
		</div>
	</form>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
$(function(){
$('#inputTitle').on('keyup', function(){
var key=$("#inputTitle").val();
$('#durl').val(slugify(key));
})
})
function slugify(text)
{
return text.toString().toLowerCase()
.replace(/\s+/g, '-')           // Replace spaces with -
.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
.replace(/\-\-+/g, '-')         // Replace multiple - with single -
.replace(/^-+/, '')             // Trim - from start of text
.replace(/-+$/, '');            // Trim - from end of text
}
</script>
@endsection