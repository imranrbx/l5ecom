@extends('layouts.app')
@section('sidebar')
<div class="m-md-5">
	@include('layouts/partials/sidebar')
</div>
@endsection
@section('contents')
	@include('layouts/partials/products')
@endsection