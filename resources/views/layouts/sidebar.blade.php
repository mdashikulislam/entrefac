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
                @if($roleName === USER)
                    <li class="nav-item">
                        <a href="{{route('user.account')}}" class="nav-link {{$currentRoute == 'user.account' ? 'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('donate')}}" class="nav-link {{$currentRoute == 'donate' ? 'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Payment
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('my.profile')}}" class="nav-link {{$currentRoute == 'my.profile' ? 'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('referral')}}" class="nav-link {{$currentRoute == 'referral' ? 'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Referral
                            </p>
                        </a>
                    </li>
                @endif
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
                    <li class="nav-item">
                        <a href="{{route('donor')}}" class="nav-link {{$currentRoute == 'donor' ? 'active':''}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Payments
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('setting')}}" class="nav-link {{$currentRoute == 'setting' ? 'active':''}}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Setting
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        @if(getAuthRoleName() == USER)
            <div class="accounts mt-5">
                <h4>Account Status</h4>
                @if(Auth::user()->account_status == 'Pending')
                    <p style="color: #fd8977">Pending Approval</p>
                @elseif(Auth::user()->account_status == 'Approved')
                    @if(Auth::user()->payment_status == 'Pending')
                        <p style="margin: 0;color: #979797">Account approved</p>
                        <p style="margin: 0;color: #979797">Pending Payment:</p>
                        <a href="{{route('payment')}}" class="d-block" style="color: limegreen;font-weight:bold;font-size: 22px;">Pay Now</a>
                        <p style="color: #fff">to join the challenge or leave it if you wish to pay later</p>
                    @elseif(Auth::user()->payment_status == 'Approved')
                        <p style="margin: 0;color: #979797">Account approved</p>
                        <p style="color: limegreen;font-weight:bold;font-size: 22px;">for factory challenge.</p>
                    @endif
                @endif
            </div>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<style>
    .accounts{
        text-align: center;
    }
    .accounts h4{
        color: #fff;
    }
</style>
