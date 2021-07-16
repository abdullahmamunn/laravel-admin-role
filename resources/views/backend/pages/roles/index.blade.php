@extends('backend.layouts.master')
@section('title')
 Admin Role
@endsection

@section('content')
 <!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('roles.index')}}">Admin Role</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
           @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
 <div class="row">
    <!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title d-inline">Data Table Dark</h4>
                <a href="{{route('roles.create')}}" class="header-title float-right">Add new Role</a>
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
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th style="width: 5%">SL</th>
                                <th style="width: 15%">Role Name</th>
                                <th style="width: 60%">Permissions</th>
                                <th style="width: 20%">Action</th>
                                <th>Permissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                          <span class="badge badge-info mr-1">{{$permission->name}}</span>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-success">Edit</a>
                                     <a class="btn btn-warning" href="{{ route('roles.destroy', $role->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete
                                    </a>
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                          <span class="badge badge-info mr-1">{{$permission->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->
</div>
@stop
