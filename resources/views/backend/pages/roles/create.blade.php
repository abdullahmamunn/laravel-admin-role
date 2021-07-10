@extends('backend.layouts.master')
@section('title')
Admin role create
@stop

@section('content')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('roles.create')}}">Admin Role Create</a></li>
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
	 	<h4 class="text-center">Create New Role</h4>
	 	<form action="{{route('roles.store')}}" method="post">
			@csrf
			<div class="form-group">
			    <label for="exampleInputEmail1">Add Role</label>
			    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="roleHelp" placeholder="Enter role">
			    @error('name')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
				<br>
				<label for="exampleInputEmail1">Add Permissions</label>
				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkPermissionAll">
                    <label class="custom-control-label" for="checkPermissionAll">All Check</label>
	            </div>
	            <hr>
				@foreach($permissions as $permission)
	                <div class="custom-control custom-checkbox">
	                    <input type="checkbox" class="custom-control-input" name="permissions[]" id="{{$permission->id}}" value="{{$permission->name}}">
	                    <label class="custom-control-label" for="{{$permission->id}}">{{$permission->name}}</label>
	                </div>
	            @endforeach
 			</div>
 			 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	 	</div>
	 </div>
	</div>
</div>
<script>
	$( "#checkPermissionAll" ).click(function() {
	  alert( "Handler." );
	});
</script>
@endsection

