@extends('admin.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Categories List</h2>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="{{route('admin.category.create')}}" class="btn btn-sm btn-outline-secondary">
			Add Category
		</a>
	</div>
</div>
           <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Slug</th>
                  <th>Categories</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@if($categories)
              	@foreach($categories as $category)
                <tr>
                <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td>{!! $category->description !!}</td>
                  <td>{{$category->slug}}</td>
                  <td>
                  	@if($category->childrens()->count() > 0)
                  		@foreach($category->childrens as $children)
                  			{{$children->title}},
                  		@endforeach
                  	@else
                  		<strong>{{"Parent Category"}}</strong>
                  	@endif
                  </td>
                  <td>{{$category->created_at}}</td>
                  <td><a class="btn btn-info btn-sm" href="#">Edit</a> | <a class="btn btn-danger btn-sm" href="#">Delete</a></td>
                </tr>
                @endforeach
        		@else
        		  <tr>
        		  	<td colspan="5">No Categories Found..</td>
        		  </tr>
        		@endif
              </tbody>
            </table>
          </div>
@endsection