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
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar direction">

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
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
                    <i class="fa fa-users"></i>
                    <span>اساتید</span>
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
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/adminLTE.min.js') }}" defer></script>
</body>
</html>
