@extends('backend.layouts.master')
@section('title')
Admin role create
@stop
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
	.custom-control-label{
        text-transform: capitalize;
    }
</style>
@endsection
@section('content')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('users.edit',$user->id)}}">{{$user->name}} Edit</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
           @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<div class="row offset-2 mt-5">
	<div class="col-md-10">
	 <div class="card">
	 	<div class="card-body">
	 	<h4 class="text-center">Edit "{{$user->name}}" Role</h4>
        <form action="{{route('users.update',$user->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="exampleInputName" aria-describedby="roleHelp" placeholder="Enter Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleEmailName" aria-describedby="roleHelp" placeholder="Enter Email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" id="" aria-describedby="roleHelp" placeholder="Enter Password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Pasword</label>
                <input type="password" class="form-control" name="password_confirmation" id="" aria-describedby="roleHelp" placeholder="Confirm Password">
            </div>
            <div class="form-gruop">
                <label for="password">Assign Roles</label>
                <select name="roles[]" id="roles" class="form-control select2" multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
             <button type="submit" class="btn btn-primary float-right mt-5">Submit</button>
        </form>
	 	</div>
	 </div>
	</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection