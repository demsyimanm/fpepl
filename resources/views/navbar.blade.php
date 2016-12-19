<header class="main-header">
    <!-- Logo -->
    <a href="{{url('dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>USER</b>MonKP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->nm_pd}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                            <p>
                                @if(Auth::user()->role == 3)
                                User - Mahasiswa ITS
                                @elseif(Auth::user()->role == 2)
                                    Dosen
                                @else
                                    Admin
                                @endif
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            {{--<div class="pull-left">--}}
                            {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                            {{--</div>--}}
                            <div class="pull-right">
                                <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding:0px">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">USER MENU</li>
            @if(Auth::user()->role == 3)
                <li class="treeview">
                    <a href="{{url('internform')}}">
                        <i class="fa fa-dashboard"></i> <span>Formulir KP</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('proposal')}}">
                        <i class="fa fa-check"></i> <span>Status Pengajuan</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('dailylog')}}">
                        <i class="fa fa-edit"></i> <span>Catatan Harian</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('companylist')}}">
                        <i class="fa fa-building-o"></i> <span>Daftar Perusahaan</span>
                    </a>
                </li>
            @elseif(Auth::user()->role == 1)
                <li class="treeview">
                    <a href="{{url('dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Permohonan KP Terbaru</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('accepted')}}">
                        <i class="fa fa-check"></i> <span>Permohonan Diterima</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('rejected')}}">
                        <i class="fa fa-close"></i> <span>Permohonan Ditolak</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{url('companylist')}}">
                        <i class="fa fa-edit"></i> <span>Daftar Perusahaan</span>
                    </a>
                </li>
            @else
                <li class="treeview">
                    <a href="{{url('dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Kelompok bimbingan</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>