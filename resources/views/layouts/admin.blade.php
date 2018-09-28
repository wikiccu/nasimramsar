<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Styles -->
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
            <a href="index2.html" class="logo">
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

                    <!-- Optionally, you can add icons to the links -->
                    <li class="header">منو ها</li>
                    <li class="">
                        <a href="/admin">
                            <i class="fa fa-dashboard"></i>
                            <span>داشبورد</span>
                        </a>
                    </li>

                    <li class="header">بخش محصولات</li>
                    <li class="treeview ">
                        <a href="#"><i class="fa fa-cubes"></i> <span>محصولات</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class=""><a href=""><i class="fa fa-cart-plus"></i>محصول جدید</a></li>
                            <li class=""><a href="/Admin/Products"><i class="fa fa-list-alt"></i>لیست محصولات</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="/Admin/Categories"><i class="fa fa-sitemap"></i>دسته بندی ها</a></li>
                    <li class=""><a href="/Admin/Materials"><i class="fa fa-tag"></i>جنس محصولات</a></li>
                    <li class=""><a href="/Admin/Scales"><i class="fa fa-tag"></i>سایز بندی محصولات</a></li>
                    <li class=""><a href="/Admin/Sponsors"><i class="fa fa-truck"></i>حامیان</a></li>

                    <li class="header">بخش مقالات</li>
                    <li class="">
                        <a href="/Admin/Blogs">
                            <i class="fa fa-files-o"></i>
                            <span>مقالات</span>
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
                Copyright © 2017 <a href="http://www.Ardavankala.com">Ardavan kala</a> Inc. All rights reserved
            </div>
            <!-- Default to the left -->
            <strong>کليه حقوق اين سايت متعلق به <a href="http://www.Ardavankala.com">اردوان کالا</a> می‌باشد.</strong>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/adminLTE.min.js') }}" defer></script>
</body>
</html>
