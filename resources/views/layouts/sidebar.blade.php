@php
$roleName = getAuthRoleName();
$currentRoute = Route::currentRouteName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('landing')}}" class="brand-link">
        <img src="{{asset('assets/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span style="font-size: 18px;" class="brand-text font-weight-light">ENTRAFAC CONSULTLTD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('landing')}}" class="d-block">{{ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name)}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('landing')}}" class="nav-link {{$currentRoute == 'landing' || $currentRoute == 'profile' || $currentRoute == 'document' || $currentRoute == 'contact' ? 'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if($roleName === ADMIN)
                    <li class="nav-item">
                        <a href="{{route('user')}}" class="nav-link {{$currentRoute == 'user' ? 'active':''}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('entrepreneurs')}}" class="nav-link {{$currentRoute == 'entrepreneurs' ? 'active':''}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Entrepreneurs
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
