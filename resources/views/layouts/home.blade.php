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
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

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

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="index.html">
                        <img src="images/bo.png" alt="" title="موسسه نسیم رامسر">
                    </a>
                </div>
                <div class="login">
                    <ul class="nav-login">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="persianFont">ورود</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal2" class="persianFont">عضویت</a>
                        </li>
                    </ul>
                </div>
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
        <div class="banner">
            <div class="container">
                <div class="banner-text">
                    <h2 class="myDirection persianFont">موسسه فرهنگی هنری نسیم رامسر</h2>
                    <p class="myDirection persianFont">با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی </p>
                </div>
                <p class="banner-text1 myDirection persianFont">فناوری اطلاعات، حسابداری و مالی، عمران و معماری</p>
            </div>
        </div>
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
                                    <a class="active persianFont" href="index.html">صفحه اول </a>
                                </li>
                                <li>
                                    <a class="persianFont" href="portfolio.html">فعالیت های ما</a>
                                </li>
                                <li>
                                    <a class="persianFont" href="blogs.html"> اخبار و مقالات </a>
                                </li>
                                <li>
                                    <a class="persianFont" href="about.html">درباره ما</a>
                                </li>
                                <!-- <li>
                                    <a href="typo.html">Short Codes</a>
                                </li> -->
                                <li>
                                    <a class="persianFont" href="contact.html">تماس با ما</a>
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

    <div class="content">
        <div class="container">

            <div class="content-mid">
                <div class="col-md-4 content-top1 pull-right">
                    <div class="content-top2 myDirection">
                        <h4 class="persianFont">فناوری اطلاعات </h4>
                        <h6 class="persianFont"> آموزشگاه کامپیوتر و حسابداری نسیم رامسر</h6>
                        <p class="persianFont">با مجوز رسمی از سازمان فنی و حرفه ای</p>
                        <p class="persianFont">ICDL درجه یک،ICDL درجه دو، فتوشاپ، طراحی صفحات وب، برنامه نویسی و ...</p>
                    </div>
                </div>
                <div class="col-md-4 content-top1 pull-right">
                    <div class=" content-top2 myDirection">
                        <h4 class="persianFont">عمران و معماری </h4>
                        <h6 class="persianFont"> دوره های تخصصی و حرفه ای</h6>
                        <p class="persianFont">نقشه کشی ساختمان، نقشه کشی معماری، طراحی سه بعدی سازه ها ETABS، طراحی معماری به همراه آرشیکد، نقشه کشی ساختمان با اتوکد،
                            نقشه کشی سازه</p>
                    </div>
                </div>
                <div class="col-md-4 content-mid-1">
                    <div class="port effect-1">
                        <div class="image-box">
                            <img src="images/a1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="text-desc text-ed">
                            <h6 class="persianFont">صنایع دستی</h6>
                            <p class="persianFont"> آموزش چرم دوزی،فرش و گلیم بافی، چادرشب، گبه، قلمزنی، شیشه‌گری، منبت کاری، مینا کاری، سفال، چوب</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!---->
    <div class="services">
        <div class="container">
            <div class="service-head">
                <h3 class="persianFont myDirection">فعالیت های ما </h3>
                <p class="persianFont">آخرین خبر ها و فعالیت ها</p>
            </div>
            <div class="servies-top">

                <div class="section group">
                    <div class="section group">
                        <div class="col-md-6 listview_1_of_2">
                            <div class="images_1_of_2">
                                <div class="listimg col-md-4 col-xs-12 pull-right">
                                    <img src="images/news/orf.jpg" alt="">
                                </div>
                                <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                    <h3>موسیقی کودکان</h3>
                                    <p>ثبت نام دوره های جدید موسیقی کودکان با تدریس استاد گلپور شروع شد... .</p>
                                    <div class="button">
                                        <span>
                                            <a href="singleblog.html">ادامه مطلب</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-6 listview_1_of_2">
                            <div class="images_1_of_2">
                                <div class="listimg col-md-4 col-xs-12 pull-right">
                                    <img src="images/news/web.jpg" alt="">
                                </div>
                                <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                    <h3>دوره های کامپیوتر </h3>
                                    <p>ثبت نام دوره های جدید کامپیوتر و برنامه نویسی شروع شد.</p>
                                    <div class="button">
                                        <span>
                                            <a href="singleblog.html">ادامه مطلب</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col-md-6 listview_1_of_2">
                        <div class="images_1_of_2">
                            <div class="listimg col-md-4 col-xs-12 pull-right">
                                <img src="images/news/kargah2.jpg" alt="">
                            </div>
                            <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                    <h3>کارگاه های حسابداری </h3>
                                    <p>ثبت نام کارگاه های جدید حسابداری و مالی، با تدریس استاد ابراهیمیان و ...  آغاز گردید .</p>
                                    <div class="button">
                                    <span>
                                        <a href="singleblog.html">ادامه مطلب</a>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-6 listview_1_of_2">
                        <div class="images_1_of_2">
                            <div class="listimg col-md-4 col-xs-12 pull-right">
                                <img src="images/news/carpet.jpg" alt="">
                            </div>
                            <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                    <h3> کلاس های صنایع دستی </h3>
                                    <p>ثبت نام ذوره های جدید کلاس های قالی بافی، چرم دوزی و ... با تدریس استاد سرکار خانم قربانی آغاز گردید .</p>
                                    <div class="button">
                                    <span>
                                        <a href="singleblog.html">ادامه مطلب</a>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="section group">
                    <div class="col-md-6 listview_1_of_2">
                        <div class="images_1_of_2">
                            <div class="listimg col-md-4 col-xs-12 pull-right">
                                <img src="images/news/modem.jpg" alt="">
                            </div>
                            <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                <h3>عرضه مودم نسل چهارم</h3>
                                <p> مودم نسل چهارم اینترنت آسیاتک (LTE) در فروشگاه نسیم رایانه عرضه می گردد</p>
                                <div class="button">
                                    <span>
                                        <a href="singleblog.html">ادامه مطلب</a>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-6 listview_1_of_2">
                        <div class="images_1_of_2">
                            <div class="listimg col-md-4 col-xs-12 pull-right">
                                <img src="images/news/music.jpg" alt="">
                            </div>
                            <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                <h3>دوره های موسیقی</h3>
                                <p> آموزش ساز های پیانو، تار و سه تار، گیتار، سنتور و ... در موسسه فرهنگی هنری نسیم رامسر  </p>
                                <div class="button">
                                    <span>
                                        <a href="singleblog.html">ادامه مطلب</a>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>



                <div class="section group">
                    <div class="col-md-2 contact-form pull-left">
                        <a href="blogs.html" class="persianFont btn-style">بقیه خبر ها </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="test">
        <div class="container">
            <h3 class="persianFont myDirection">برخی از اساتید </h3>
            <div class=" test-grid-1">
                <div class="col-md-6 test-wrapper pull-right">
                    <img src="images/teachers/dr.roshan.jpg" alt="" class="img-responsive">
                    <div class="test-grid">
                        <div class="test-gr">
                            <a class="teacherlink" href="#" ><h4 class="persianFont">دکتر هادی روشن</h4></a>
                            <span class="persianFont">دکتری کامپیوتر و استاد دانشگاه</span>
                        </div>
                        <p class="myDirection persianFont">آموزش هوش مصنوعی، طراحی الگوریتم، زبان ماشین و اسمبلی،اصول و روشها در طراحی کامپایلر، گرافیک کامپیوتری و سایر مطالب
                            مربوطه
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 test-wrapper pull-right">
                    <img src="images/teachers/golpour.jpg" alt="" class="img-responsive">
                    <div class="test-grid">
                        <div class="test-gr">
                            <h4 class="persianFont">آقای گلپور</h4>
                            <span class="persianFont">استا و نوازنده پیانو</span>
                        </div>
                        <p class="myDirection persianFont">
                            آموزش پیانو، سلفژ، نت خوانی و ...
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"> </div>
            </div>
            <div class=" test-grid-2">
                <div class="col-md-6 test-wrapper pull-right">
                    <img src="images/teachers/ghorbani.jpg" alt="" class="img-responsive">
                    <div class="test-grid">
                        <div class="test-gr">
                            <h4 class="persianFont">سرکار خانم قربانی</h4>
                            <span class="persianFont">استاد صنایع دستی</span>
                        </div>
                        <p class="myDirection persianFont">
                            آموزش صنایع دستی
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 test-wrapper pull-right">
                    <img src="images/teachers/ebrahimian.jpg" alt="" class="img-responsive">
                    <div class="test-grid">
                        <div class="test-gr">
                            <h4 class="persianFont">آقای ابراهیمیان</h4>
                            <span class="persianFont">استاد آمار و حسابداری</span>
                        </div>
                        <p class="myDirection persianFont">
                            آموزش مسایل مربوط به حسابداری و مالیات
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="test-grid-2">
                <div class="col-md-2 contact-form pull-left">
                    <a href="about.html#teachers" class="persianFont btn-style">بقیه اساتید</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <!---->
    <div class="content-bottom">
        <h1 class="persianFont myDirection">گالری تصاویر</h1>
        <div class="content-in">
            <div class="port effect-1">
                <div class="image-box">
                    <img src="images/gallery/fi.jpg" alt="" class="img-responsive">
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
                    <img src="images/gallery/fi1.jpg" alt="" class="img-responsive">
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
                    <img src="images/gallery/fi3.jpg" alt="" class="img-responsive">
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
                    <img src="images/gallery/fi2.jpg" alt="" class="img-responsive">
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
                    <img src="images/gallery/fi4.jpg" alt="" class="img-responsive">
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
</body>
</html>
