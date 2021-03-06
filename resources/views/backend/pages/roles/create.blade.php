@extends('backend.layouts.master')
@section('title')
Admin role create
@stop
@section('styles')
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
				@if(Session::has('success'))
				  <div class="alert alert-success">
				  	<p>{{Session::get('success')}}</p>
				  </div>
				@endif
				@if(Session::has('error'))
				  <div class="alert alert-success">
				  	<p>{{Session::get('success')}}</p>
				  </div>
				@endif
				<br>
				<label for="exampleInputEmail1">Add Permissions</label>
				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkAll" value="1">
                    <label class="custom-control-label" for="checkAll">All Check</label>
	            </div>
	            <hr>
	          
	            @foreach($group_name as $group)
	            <div class="row">
	            	<div class="col-3">
		            	<div class="custom-control custom-checkbox">
		                    <input type="checkbox" class="custom-control-input" id="{{ $group->name }}-management" value="{{$group->name}}" onclick="checkPermissionByGroup('role-{{ $group->name }}-management-checkbox', this)">
		                    <label class="custom-control-label" for="{{ $group->name }}-management">{{ $group->name }}</label>
		                </div>
	            	</div>
	            	
	            	<div class="col-9 role-{{ $group->name }}-management-checkbox">
		            	@php
	                       // $permissions = \Spatie\Permission\Models\Permission::where('group_name', $group->name)->get();
		            	    $permissions = App\User::permissionsByGroupName($group->name);
		            	  
		            	@endphp
		            	@foreach($permissions as $permission)
			                <div class="custom-control custom-checkbox">
			                    <input type="checkbox" class="custom-control-input" name="permissions[]" id="checkPermission{{$permission->id}}" value="{{$permission->name}}">
			                    <label class="custom-control-label" for="checkPermission{{$permission->id}}">{{$permission->name}}</label>
			                </div>
			                @php
			                @endphp
	                    @endforeach
	                    <br>
	            	</div>
	            </div>
				@endforeach
 			</div>
 			 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	 	</div>
	 </div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$("#checkAll").click(function(){
            if($("#checkAll").is(':checked')){
            	// check all the checkbox
            	$('input[type=checkbox]').prop('checked', true);
            }
            else{
            	// check all the uncheck
            	$('input[type=checkbox]').prop('checked', false);
            }
         });
	function checkPermissionByGroup(className, checkThis){
		    const groupName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
	}
</script>
@endsection