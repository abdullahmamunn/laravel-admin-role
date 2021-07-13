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
	 <div class="col-10 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">email list</h4>
                 <table class="table">
                     <thead>
                         <tr>
                             <th>sl</th>
                             <th>username</th>
                             <th>email</th>
                             <th>app password</th>
                             <th>action</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach($email_lsit as $list)
                         <tr>
                             <td>{{$loop->index+1}}</td>
                             <td>{{$list->username}}</td>
                             <td>{{$list->email}}</td>
                             <td>{{$list->app_password}}</td>
                             <td>
                                <form action="{{route('email.destroy',$list->id)}}" method="post">
                                @csrf
                                   @method('DELETE')
                                     <a href="{{route('email.edit',$list->id)}}" class="btm btn-primary btn-xs">edit</a>
                                     {{-- <a type="submit" class="btm btn-primary btn-xs">delete</a> --}}
                                     <button type="submit" class="btn btn-primary btn-xs">Delete</button>
                                 </form>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
@endsection