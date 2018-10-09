<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="آموزش, نسیم, نسیم رامسر, صنایع دستی, فنی و حرفه ای, کامپیوتر, برنامه نویسی, هنر, معماری, عمران حسابداری"/>

    <title>موسسه نسیم رامسر | @yield('title')</title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/adminlte/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/myStyle.css') }}" rel="stylesheet">

    <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
    </script>

    @yield('header')

</head>
<body>
    <div class="header @if($menu!='welcome') head1 @endif">
        <div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="images/bo.png" alt="" title="موسسه نسیم رامسر">
                    </a>
                </div>
                @if (Route::has('login'))
                <div class="login">
                    <ul class="nav-login">
                        @auth
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="persianFont">ورود</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal2" class="persianFont">عضویت</a>
                        </li>
                        @else
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                <input name='return' type='hidden' value='".urlencode($_SERVER['PHP_SELF'])."' />
                                @csrf
                                <button type='submit' class='persianFont logoutBtn'>خروج</button>
                            </form>
                        </li>
                        {{--  @if ( $user->isAdmin() )
                            <p>Yay! I'm Admin!</p>
                        @endif  --}}
                        <li>
                            <a href='{{url('admin')}}' class='persianFont'>بخش مدیریت</a>
                        </li>
                        @endauth
                    </ul>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- login -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-info">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-spa">
                        <div class="login-grids">

                            <div class="login-right">
                                <form action="#" method="post">
                                    <h3 class="myDirection persianFont">برای ورود اطلاعات خود را وارد کنید </h3>
                                    <input type="text" value="Enter your mobile number or Email" name=" Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your mobile number or Email';}"
                                        required="">
                                    <input type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"
                                        required="">
                                    <h4 class="myDirection persianFont">
                                        <a href="#">فراموش کردن رمزعبور</a> /
                                        <a href="#">ساخت پسورد جدید</a>
                                    </h4>
                                    <div class="single-bottom myDirection">
                                        <input type="checkbox" id="brand" value="">
                                        <label class="persianFont" for="brand">
                                            <span></span>مرابه خاطر بسپار</label>
                                    </div>
                                    <input class="persianFont" type="submit" value="ورود">
                                </form>
                            </div>

                            <p class="myDirection persianFont">با ورود، موافقت خود را با
                                <span>شرایط استفاده</span> و
                                <span>سایر مقررات</span> اعلام می کنم.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //login -->
        <!-- signup -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-info">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-spa">
                        <div class="login-grids">

                            <div class="login-right">
                                <form action="#" method="post">
                                    <h3 class="myDirection persianFont">ساخت حساب کاربری </h3>
                                    <input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"
                                        required="">
                                    <input type="text" value="Mobile number" name="Mobile number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile number';}"
                                        required="">
                                    <input type="text" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"
                                        required="">
                                    <input type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"
                                        required="">

                                    <input class="persianFont" type="submit" value="ساخت حساب کاربری">
                                </form>
                            </div>

                            <p class="myDirection persianFont">با ورود، موافقت خود را با
                                <span>شرایط استفاده</span> و
                                <span>سایر مقررات</span> اعلام می کنم.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //signup -->
        @if($menu=='welcome')
            <div class="banner">
                <div class="container">
                    <div class="banner-text">
                        <h2 class="myDirection persianFont">موسسه فرهنگی هنری نسیم رامسر</h2>
                        <p class="myDirection persianFont">با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی </p>
                    </div>
                    <p class="banner-text1 myDirection persianFont">فناوری اطلاعات، حسابداری و مالی، عمران و معماری</p>
                </div>
            </div>
        @endif
        <div class="nav-top">
            <div class="container">
                <div class="nav1">
                    <div class="navbar1">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav cl-effect-8">
                                <li>
                                    <a class="@if($menu=='welcome')active @endif persianFont" href="{{url('/')}}">صفحه اول</a>
                                </li>
                                <li>
                                    <a class="@if($menu=='activity')active @endif persianFont" href="{{url('activity')}}">فعالیت های ما</a>
                                </li>
                                <li>
                                    <a class="@if($menu=='news')active @endif persianFont" href="{{url('news')}}"> اخبار و مقالات</a>
                                </li>
                                <li>
                                    <a class="@if($menu=='gallery')active @endif persianFont" href="{{url('gallery')}}">گالری</a>
                                </li>
                                <li>
                                    <a class="@if($menu=='about')active @endif persianFont" href="{{url('about')}}">دربارۀ ما</a>
                                </li>
                                <li>
                                    <a class="@if($menu=='contact')active @endif persianFont" href="{{url('contact')}}">تماس با ما</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- start search-->
                    <ul class="social-ic">
                        <li>
                            <a href="#">
                                <i></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ic"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ic1"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ic2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!---->
    <div class="content-bottom">
        <h1 class="persianFont myDirection">گالری تصاویر
            <a href="{{url('gallery')}}" class="btn btn-default pull-left gallery_btn" style="">سایر تصاویر</a>
        </h1>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="{{asset('images/galleries/fi.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="text-desc">
                    <h6 class="persianFont myDirection">آموزش C#</h6>
                    <p class="persianFont myDirection">آموزش زبان برنامه نویسی سی شارپ مقدماتی و پیشرفته</p>
                </div>
            </div>
        </div>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="{{asset('images/galleries/fi1.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="text-desc">
                    <h6 class="persianFont myDirection">آموزش چرم دوزی</h6>
                    <p class="persianFont myDirection">با اساتید حرفه ای و کار عملی</p>
                </div>
            </div>
        </div>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="{{asset('images/galleries/fi3.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="text-desc">
                    <h6 class="persianFont myDirection">آموزش پیانو</h6>
                    <p class="persianFont myDirection">با اساتید حرفه ای </p>
                </div>
            </div>
        </div>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="{{asset('images/galleries/fi2.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="text-desc">
                    <h6 class="persianFont myDirection">آموزش نرم افزار هلو</h6>
                    <p class="persianFont myDirection">به صورت عملی همراه با پروژه های کاربردی</p>
                </div>
            </div>
        </div>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="{{asset('images/galleries/fi4.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="text-desc">
                    <h6 class="persianFont myDirection">دوره های مالیاتی</h6>
                    <p class="persianFont myDirection">دوره های کوتاه مدت و بلند مدت</p>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!---->
    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="col-md-6 footer-left pull-right">
                <h3 class="persianFont myDirection">اطلاعات </h3>
                <p class="para persianFont myDirection">موسسه فرهنگی هنری نسیم رامسر
                        {{--  <script type='text/javascript' src='http://webshomar.com/rx/?counter/stat/9002/c055c825fcdd5e60d25df7e7123b66c9/script.js'></script>  --}}
                    <br>با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی
                    <br>شماره ثبت: 10
                    <br>تاریخ ثبت: 81/6/23</p>
                <!--<h3>Newsletter
                    <label></label>
                </h3>
                    <form action="#" method="post">
                    <input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"
                        required="">
                    <input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"
                        required="">
                    <input type="submit" value="Submit">
                </form> -->
            </div>
            <div class="col-md-6 footer-right pull-left">
                <h3 class="persianFont myDirection">تماس با ما </h3>
                <ul class="con-icons">
                    <li>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                        <span class="persianFont">+11 55 25 9606</span>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                        <span class="persianFont">+11 55 25 6633</span>
                    </li>
                    <li>
                        <a href="mailto:info@example.com">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@nasimramsar.com</a>
                    </li>
                </ul>
                <!-- <p class="copy-right">© 2016 Academic. All rights reserved | Design by
                    <a href="http://w3layouts.com/">W3layouts</a>
                </p> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--//footer-->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    @yield('scripts')
</body>
