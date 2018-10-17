<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ str_replace('_', ' ', config('app.name', 'Laravel')) }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/adminlte/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte/myAdminStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte/skin-blue.min.css') }}" rel="stylesheet">

    @yield('header')

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('admin')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <b>مدیریت</b>
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    بخش
                    <b>مدیریت</b>
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav" style="padding-right: 0;padding-left: 2em;">
                        @guest
                        <li >
                            <a href="{{ route('login') }}">
                                <i class="fa fa-sign-in text-aqua"></i>
                                ورود به سایت
                            </a>
                        </li>
                        <li>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <i class="fa fa-wpforms text-success"></i>
                                    عضویت در سایت
                                </a>
                            @endif
                        </li>
                        @else

                        <li class="dropdown notifications-menu open">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu" style="text-align: right">
                                <li>
                                <!-- inner menu: contains the actual data -->
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 130px;">
                                    <ul class="menu" style="overflow: hidden; width: 100%; height: 130px;">

                                        <li>
                                            <a href="{{url('home')}}">
                                                <i class="fa fa-home text-aqua"></i> خانه
                                            </a>
                                        </li>
                                        @if ( Auth::user()->isAdmin() )
                                        <li>
                                            <a href="{{url('admin')}}">
                                                <i class="fa fa-dashboard text-yellow"></i> بخش مدیریت
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out text-red"></i> خروج
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </ul>
                                    <div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                    </li>

                                {{--  <li class="footer"><a href="#">View all</a></li>  --}}
                            </ul>
                            </li>
                        @endguest
                    </ul>
                    </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar direction">

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">

                @auth

                <li class="header">بخش ها</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="@if($menu=='admin') active @endif">
                  <a href="{{url('admin')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>داشبورد</span>
                  </a>
                </li>
                <li class="@if($menu=='subject') active @endif">
                    <a href="{{url('admin\subject')}}">
                      <i class="fa fa-sitemap"></i>
                      <span>موضوع ها</span>
                    </a>
                </li>
                <li class="@if($menu=='post') active @endif">
                  <a href="{{url('admin\post')}}">
                    <i class="fa fa-files-o"></i>
                    <span>خبر ها</span>
                  </a>
                </li>
                <li class="@if($menu=='field') active @endif">
                  <a href="{{url('admin\field')}}">
                    <i class="fa fa-sitemap"></i>
                    <span>رشته ها</span>
                  </a>
                </li>
                <li class="@if($menu=='course') active @endif">
                  <a href="{{url('admin\course')}}">
                    <i class="fa fa-calendar"></i>
                    <span>دوره ها</span>
                  </a>
                </li>
                <li class="@if($menu=='teacher') active @endif">
                  <a href="{{url('admin\teacher')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>اساتید</span>
                  </a>
                </li>
                <li class="@if($menu=='teachercourse') active @endif">
                  <a href="{{url('admin\teachercourse')}}">
                    <i class="fa fa-users"></i>
                    <span>دوره های اساتید</span>
                  </a>
                </li>
                <li class="@if($menu=='gallery') active @endif">
                  <a href="{{url('admin\gallery')}}">
                    <i class="fa fa-picture-o"></i>
                    <span>گالری</span>
                  </a>
                </li>
                <li class="@if($menu=='message') active @endif">
                  <a href="{{url('admin\message')}}">
                    <i class="fa fa-envelope"></i>
                    <span>پیام ها</span>
                  </a>
                </li>

                @else

                <li class="header">لینک ها</li>
                <li>
                    <a href="{{ route('login') }}">
                        <i class="fa fa-sign-in"></i>
                        <span>ورود</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}">
                        <i class="fa fa-wpforms"></i>
                        <span>عضویت</span>
                    </a>
                </li>

                @endauth

              </ul>
              <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 class="myDir">

                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- Your Page Content Here -->
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-left hidden-xs">
                Copyright © 2017 <a href="http://www.nasimramsar.com">nasim ramsar</a> Inc. All rights reserved
            </div>
            <!-- Default to the left -->
            <strong>کليه حقوق اين سايت متعلق به <a href="http://www.nasimramsar.com">موسسه نسیم رامسر</a> می‌باشد.</strong>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminLTE.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
