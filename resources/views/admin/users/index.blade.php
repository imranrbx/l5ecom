@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
 <li class="breadcrumb-item active" aria-current="page">users</li>
@endsection
@section('content')
  <div class="row d-block">
    <div class="col-sm-12">
      @if (session()->has('message'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>
      @endif
    </div>
  </div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Users List</h2>

  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="{{route('admin.profile.create')}}" class="btn btn-sm btn-outline-secondary">
      Add user
    </a>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Slug</th>
        <th>role</th>
        <th>Address</th>
        <th>Thumbnail</th>
        <th>Date Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($users) && $users->count() > 0)
      @foreach($users as $user)
      <tr>
        <td>{{@$user->id}}</td>
        <td>{{@$user->profile->name}}</td>
        <td>{{@$user->email}}</td>
        <td>{{@$user->profile->slug}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{@$user->profile->address}},{{@$user->getCountry()}},{{@$user->getState()}}, {{@$user->getCity()}}</td>
        <td><img src="{{asset('storage/'.$user->profile->thumbnail)}}" alt="{{@$user->profile->name}}" class="img-responsive" height="50"/></td>
        @if($user->trashed())
         <td>{{@$user->deleted_at}}</td>
        <td><a class="btn btn-info btn-sm" href="{{route('admin.profile.recover',$user->id)}}">Restore</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$user->id}}')">Delete</a>
        <form id="delete-user-{{$user->id}}" action="{{ route('admin.profile.destroy', $user->profile->slug) }}" method="POST" style="display: none;">
          
          @method('DELETE')
          @csrf
            </form>
        </td>
        @else
        <td>{{$user->created_at}}</td>
        <td><a class="btn btn-info btn-sm" href="{{route('admin.profile.edit',$user->profile->slug)}}">Edit</a> | <a id="trash-user-{{$user->id}}" class="btn btn-warning btn-sm" href="{{route('admin.profile.remove',$user->profile->slug)}}">Trash</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$user->id}}')">Delete</a>
        <form id="delete-user-{{$user->id}}" action="{{ route('admin.profile.destroy', $user->profile->slug) }}" method="POST" style="display: none;">
          
          @method('DELETE')
          @csrf
              </form>
        </td>
        @endif
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="7" class="alert alert-info">No users Found..</td>
      </tr>
      @endif
      
    </tbody>
    
  </table>
</div>
<div class="row">
  <div class="col-md-12">
    {{$users->links()}}
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  function confirmDelete(id){
    let choice = confirm("Are You sure, You want to Delete this user ?")
    if(choice){
      document.getElementById('delete-user-'+id).submit();
    }
  }
</script>
@endsection