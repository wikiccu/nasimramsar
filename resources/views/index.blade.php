@extends('layouts.home')

@section('title', 'صفحه اصلی')

@section('indexContent')

<div class='banner'>
    <div class='container'>
        <div class='banner-text'>
            <h2 class='myDirection persianFont'>موسسه فرهنگی هنری نسیم رامسر</h2>
            <p class='myDirection persianFont'>با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی </p>
        </div>
        <p class='banner-text1 myDirection persianFont'>فناوری اطلاعات، حسابداری و مالی، عمران و معماری</p>
    </div>
</div>

@endsection


@section('content')

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

@endsection