@extends('backend.layouts.master')
@section('title')
Email Config
@endsection

@section('content')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('email.index')}}">Email Config</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
           @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>

<div class="row offset-2">
	 <div class="col-8 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update web email</h4>
                @if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
	            @endif
                <form action="{{route('email.update',$list->id)}}" method="post">
                    @method("PUT")
                	@csrf
                	<div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" value="{{ $list->username }}" placeholder="username">
                     
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $list->email }}" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                            email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" class="form-control" name="app_password" id="exampleInputPassword1" value="{{$list->app_password}}" placeholder="Password">
                    </div>
{{--                     <div class="form-group">
	                   <label class="col-form-label">Status</label>
		                  <select id="status_id" name="status" value="{{ old('status')}}" class="form-control">
		                    <option value="">Select Status</option>
		                    <option value="0">Inactive</option>
		                    <option value="1">Active</option>
		                  </select>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection