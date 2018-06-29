@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
 <li class="breadcrumb-item active" aria-current="page">Products</li>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Products List</h2>
	<div class="btn-toolbar mb-2 mb-md-0">
		<a href="{{route('admin.product.create')}}" class="btn btn-sm btn-outline-secondary">
			Add Product
		</a>
	</div>
</div>
@endsection