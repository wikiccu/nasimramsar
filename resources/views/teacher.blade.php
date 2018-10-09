@extends('layouts.home')

@section('title'){{$teacher->name}}@endsection

@section('content')
<!-- about -->
<div class="about">
    <div class="container">
        <div class="about-head">
            <h2 class="persianFont myDirection">استاد {{$teacher->name}} </h2>
            <p class="persianFont myDirection">{{$teacher->title}}</p>
        </div>
        <div class="about-grids">
            <div class="col-md-5 about-grid1 pull-right myDirection">
                <div class="about-img">
                    <img src="{{asset($teacher->pic)}}" class="img-responsive" alt="{{$teacher->name}}">
                </div>
                <h4 class="persianFont">دربارۀ استاد</h4>
                <p class="persianFont myDirection aboutPara">{{$teacher->abstract}}</p>
            </div>
            <div class="col-md-7 about-grid pull-left myDirection">
                {!! $teacher->description !!}
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="services">
    <div class="container">
        <div class="service-head">
            <h3 class="persianFont myDirection"> فعالیت ها </h3>
            <p class="persianFont">دوره های این استاد در موسسه نسیم رامسر</p>
        </div>
        <div class="servies-top">
            <div class="container">

                @if ($teacher->courses)
                @php $index=0; @endphp
                    @foreach ($teacher->courses as $course)
                        <div class="col-md-6 col-xs-12 listview_1_of_2">
                            <div class="images_1_of_2">
                                <div class="listimg col-md-6 col-xs-12 pull-right">
                                    <img src="{{asset($course->pic)}}" alt="{{$course->title}}">
                                </div>
                                <div class="text col-md-6 col-xs-12 pull-left persianFont" style="margin-top:3em;">
                                    <h3>{{$course->title}}</h3>
                                    <p>{{$course->abstract}}</p>
                                    <div class="button" style="margin-top:1em;">
                                        <span>
                                            <a href="{{url('course/'.$course->id)}}">اطلاعات بیشتر</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($index%2==1)
                        <div class="clearfix"> </div>
                    @endif
                    @php $index++; @endphp
                @endif

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection
