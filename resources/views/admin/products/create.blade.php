@extends('admin.app')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item "><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Add/Edit Products</li>
@endsection
@section('content')
<h2 class="modal-title">Add/Edit Products</h2>
<form  action="@if(isset($product)) {{route('admin.product.update', $product)}} @else {{route('admin.product.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="row">
		@csrf
		@if(isset($product))
		@method('PUT')
		@endif
		<div class="col-lg-9">
			<div class="form-group row">
				<div class="col-sm-12">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="col-sm-12">
					@if (session()->has('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
					@endif
				</div>
				<div class="col-lg-12">
					<label class="form-control-label">Title: </label>
					<input type="text" id="txturl" name="title" class="form-control " value="{{@$product->title}}" />
					<p class="small">{{config('app.url')}}<span id="url">{{@$product->slug}}</span>
					<input type="hidden" name="slug" id="slug" value="{{@$product->slug}}">
				</p>
			</div>
		</div>
		<div class="form-group row">
			
			<div class="col-lg-12">
				<label class="form-control-label">Description: </label>
				<textarea name="description" id="editor" class="form-control ">{!! @$product->description !!}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-6">
				<label class="form-control-label">Price: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
					<input type="text" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="price" value="{{@$product->price}}" />
				</div>
			</div>
			<div class="col-6">
				<label class="form-control-label">Discount: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
					<input type="text" class="form-control" name="discount_price" placeholder="0.00" aria-label="discount_price" aria-describedby="discount" value="{{@$product->discount_price}}" />
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="card col-sm-12 p-0 mb-2">
				<div class="card-header align-items-center">
					<h5 class="card-title float-left">Extra Options</h5>
					<div class="float-right" >
						<button type="button" id="btn-add" class="btn btn-primary btn-sm">+</button>
						<button type="button" id="btn-remove" class="btn btn-danger btn-sm">-</button>
					</div>
					
				</div>
				<div class="card-body" id="extras">

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<ul class="list-group row">
			<li class="list-group-item active"><h5>Status</h5></li>
			<li class="list-group-item">
				<div class="form-group row">
					<select class="form-control" id="status" name="status">
						<option value="0" @if(isset($product) && $product->status == 0) {{'selected'}} @endif >Pending</option>
						<option value="1" @if(isset($product) && $product->status == 1) {{'selected'}} @endif>Publish</option>
					</select>
				</div>
				<div class="form-group row">
					<div class="col-lg-12">
						@if(isset($product))
						<input type="submit" name="submit" class="btn btn-primary btn-block " value="Update Product" />
						@else
						<input type="submit" name="submit" class="btn btn-primary btn-block " value="Add Product" />
						@endif
					</div>
					
				</div>
			</li>
			<li class="list-group-item active"><h5>Feaured Image</h5></li>
			<li class="list-group-item">
				<div class="input-group mb-3">
					<div class="custom-file ">
						<input type="file"  class="custom-file-input" name="thumbnail" id="thumbnail">
						<label class="custom-file-label" for="thumbnail">Choose file</label>
					</div>
				</div>
				<div class="img-thumbnail  text-center">
					<img src="@if(isset($product)) {{asset('storage/'.$product->thumbnail)}} @else {{asset('images/no-thumbnail.jpeg')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
				</div>
			</li>
			<li class="list-group-item">
				<div class="col-12">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><input id="featured" type="checkbox" name="featured" value="@if(isset($product)){{@$product->featured}}@else{{0}}@endif" @if(isset($product) && $product->featured == 1) {{'checked'}} @endif /></span>
						</div>
						<p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured Product</p>
					</div>
				</div>
			</li>
			@php
			$ids = (isset($product) && $product->categories->count() > 0 ) ? array_pluck($product->categories->toArray(), 'id') : null;
			@endphp
			<li class="list-group-item active"><h5>Select Categories</h5></li>
			<li class="list-group-item ">
				<select name="category_id[]" id="select2" class="form-control" multiple>
					@if($categories->count() > 0)
					@foreach($categories as $category)
					<option value="{{$category->id}}"
						@if(!is_null($ids) && in_array($category->id, $ids))
						{{'selected'}}
						@endif
					>{{$category->title}}</option>
					@endforeach
					@endif
				</select>
			</li>
		</ul>
	</div>
</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
	$(function(){
			ClassicEditor.create( document.querySelector( '#editor' ), {
		toolbar: [ 'Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote','undo', 'redo' ],
	})
.then( editor => {
console.log( editor );
} )
.catch( error => {
console.error( error );
} );
     
		$('#txturl').on('keyup', function(){
			const pretty_url = slugify($(this).val());
			$('#url').html(slugify(pretty_url));
			$('#slug').val(pretty_url);
		})
		
		$('#select2').select2({
			placeholder: "Select multiple Categories",
		allowClear: true
		});

		$('#status').select2({
			placeholder: "Select a status",
		allowClear: true,
		minimumResultsForSearch: Infinity
		});
$('#thumbnail').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#imgthumbnail").attr('src', image);
});
});
$('#btn-add').on('click', function(e){
	
		var count = $('.options').length+1;
		$.get("{{route('admin.product.extras')}}").done(function(data){
			
			$('#extras').append(data);
		})
})
$('#btn-remove').on('click', function(e){	
	$('.options:last').remove();
})
$('#featured').on('change', function(){
	if($(this).is(":checked"))
		$(this).val(1)
	else
		$(this).val(0)
})
})
</script>
@endsection