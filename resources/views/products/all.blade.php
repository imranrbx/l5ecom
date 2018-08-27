@extends('layouts.app')
@section('sidebar')
<div class="m-md-5">
	@parent
</div>
@endsection
@section('content')
	@include('layouts/partials/products')
@endsection