  <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('admin.dashboard') ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                                    <span>Roles and Permissions</span>
                                </a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('roles.create') || Route::is('roles.edit') ? 'active' : ''}}"><a href="{{route('roles.create')}}">Add New Role</a></li>
                                    <li class="{{ Route::is('roles.index') ? 'active' : ''}}"><a href="{{route('roles.index')}}">Role List</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Manage Users</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('users.create')}}">Add user</a></li>
                                    <li><a href="{{route('users.index')}}">User list</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Sending Mail</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('email.create')}}">Add Email</a></li>
                                    <li><a href="{{route('email.index')}}">Email list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>