@extends('layouts.home')

@section('title')دربارۀ ما@endsection

@section('header')
<link href="{{ asset('css/home/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="about">
    <div class="container">
        <div class="about-head">
            <h2 class="persianFont myDirection">درباره ما </h2>
            <p class="persianFont myDirection"> در باره موسسه نسیم رامسر</p>
        </div>
        <div class="about-grids">

            <div class="col-md-12 about-grid">
                <h3 class="persianFont myDirection">تاریخچه موسسه فرهنگی هنری نسیم رامسر</h3>
                <h5 class="persianFont myDirection">موسسه فرهنگی هنری نسیم در روز بیست و سوم شهریور سال یک هزار و سیصد و هشتاد و یک با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی آغاز به کار کرد.
                مدیران اولیه موسسه جناب حجت الاسلام صفر قاسمی، آقای جمشید یوسفی، روح اله گلین مقدم، سرکار خانم علیزاده و جناب آقای داراب رضایی بودند.</h5>
                <h5 class="persianFont myDirection"> موسسه فرهنگی هنری نسیم رامسر کار خود را با برگزاری دوره های آموزش موسیقی، برگزاری سمینار ها، برنامه های جنگ شادی کنسرت ها  شروع نمود.
                موسسه فرهنگی هنری نسیم رامسر همزمان، آموزش و فروش قطعات کامپیوتر با مجوز از اتحادیه اصناف و مدیریت مهندس یوسفی دائر نمود.</h5>
                <h5 class="persianFont myDirection">در سال یک هزار و سیصد و نود و پنج با تجمیع در آموزشگاه <b>البرز خزر</b> رشته های معماری، نقشه کشی و آموزشگاه <b>بهارستان</b> در زمینه صنایع دستی و بافندگی، فعالیت خود را گسترش داد.</h5>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div class="services">
    <div class="container">
        <div class="service-head">
            <h3 class="persianFont myDirection">فعالیت های جانبی </h3>
            <p class="persianFont">بخشی از فعالیت های جانبی موسسه نسیم رامسر</p>
        </div>
        <div class="servies-top">
            <div class="col-md-7 us-ser pull-right">
                <div class=" why-choose">
                    <div class=" hi-icon-effect-2 hi-icon-effect-2a pull-right">
                        <a href="#set-6" class="hi-icon  glyphicon glyphicon-book"></a>
                    </div>
                    <div class="ser-top">
                        <h5 class="persianFont myDirection">فروشگاه کامپیوتر نسیم رایانه </h5>
                        <p class="persianFont myDirection">خرید و ارتقاء کامپیوتر خانگی، لپتاپ و لوازم جانبی</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" why-choose">
                    <div class=" hi-icon-effect-2 hi-icon-effect-2a pull-right">
                        <a href="#set-6" class="hi-icon  glyphicon glyphicon-leaf"></a>
                    </div>
                    <div class="ser-top">
                        <h5 class="persianFont myDirection">نمایندگی خدمات اینترنت آسیاتک</h5>
                        <p class="persianFont myDirection">اینترنت خانگی و اینترنت همراه و مودم نسل چهارم</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class=" why-choose">
                    <div class=" hi-icon-effect-2 hi-icon-effect-2a pull-right">
                        <a href="#set-6" class="hi-icon  glyphicon glyphicon-pencil"></a>
                    </div>
                    <div class="ser-top">
                        <h5 class="persianFont myDirection">آموزش موسیقی به کودکان </h5>
                        <p class="persianFont myDirection">آموزش شناخت نت ها و قطعات موسیقی، آموزش ارف و ساز های کودکان</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
            <div class="col-md-5 service-mid">
                <img src="images/co.png" alt="" class="img-responsive">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div id="teachers" class="gallery">
    <div class="container">
        <div class="gallery-top">
            <h2 class="persianFont myDirection">اساتید موسسه </h2>
            <p class="persianFont myDirection"> اساتید برجسته ای که در زمینه های مختلف با موسسه همکاری می کنند</p>
        </div>
        <ul class="simplefilter myDirection persianFont">
            <li class="active" data-filter="all">همه اساتید</li>
            @if($fields)
                @foreach ($fields as $field)
                <li data-filter="{{$field->id}}">اساتید {{$field->title}} </li>
                @endforeach
            @endif
        </ul>

        <div class="filtr-container">
            @if($teachers)
                @foreach ($teachers as $teacher)
                    <div class="col-md-3 filtr-item" data-category="{{$teacher->field_id}}" data-sort="">
                        <a href="{{url('teacher/'.$teacher->id)}}" class="b-link-stripe b-animate-go swipebox">
                            <div class="ed-gal-effect slow-zoom horizontal">
                                <div class="img-box">
                                    <img src="{{$teacher->pic}}" alt="{{$teacher->name}}" />
                                </div>
                                <div class="ed-text-box">
                                    <div class="ed-gal-text">
                                        <h4 class="persianFont myDirection">{{$teacher->name}}</h4>
                                        <p class="persianFont myDirection">{{$teacher->title}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="js/jquery.filterizr.min.js"></script>
<script src="js/controls.js"></script>

<!-- Kick off Filterizr -->
<script type="text/javascript">
    $(function () {
        //Initialize filterizr with default options
        $('.filtr-container').filterizr();
    });
</script>
@endsection
