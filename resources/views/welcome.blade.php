@extends('layouts.home')

@section('title')صفحه نخست@endsection

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
                        <img src="images/mainpic.jpg" alt="" class="img-responsive">
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
                @if($posts)
                    <?php $index=0; ?>
                    <div class="section group">
                        @foreach ($posts as $post)
                            <div class="col-md-6 listview_1_of_2">
                                <div class="images_1_of_2">
                                    <div class="listimg col-md-4 col-xs-12 pull-right">
                                        <img src="{{asset($post->pic)}}" alt="">
                                    </div>
                                    <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                        <a class="no-style" href="{{url('post/'.$post->id)}}"><h3>{{$post->title}}</h3></a>
                                        <p>{{$post->abstract}}</p>
                                        <div class="button">
                                            <span>
                                                <a href="{{url('post/'.$post->id)}}">ادامه مطلب</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        @if($index%2==1)
                        <div class="clearfix"></div></div><div class="section group">
                        @endif
                        <?php $index++ ?>
                        @endforeach
                    </div>
                @endif
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

        @if($teachers)
            <?php $index=0; ?>
            <div class="test-grid-2">
                @foreach ($teachers as $teacher)
                    <div class="col-md-6 test-wrapper pull-right">
                        <img src="{{asset($teacher->pic)}}" alt="" class="img-responsive">
                        <div class="test-grid">
                            <div class="test-gr">
                                <a class="teacherlink" href="{{url('teacher/'.$teacher->id)}}" ><h4 class="persianFont">{{$teacher->name}}</h4></a>
                                <span class="persianFont">{{$teacher->title}}</span>
                            </div>
                            <p class="myDirection persianFont">{{$teacher->abstract}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @if($index%2==1)
                    <div class="clearfix"></div></div><div class="test-grid-2">
                    @endif
                    <?php $index++ ?>
                @endforeach
            </div>
        @endif
        <div class="col-md-2 contact-form pull-left">
            <a href="{{url('about')}}" class="persianFont btn-style">بقیه اساتید</a>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection
