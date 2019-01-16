@extends('layouts.home')

@section('title'){{$course->title}}@endsection

@section('content')

<!-- about -->
<div class="about">
    <div class="container">
        <div class="about-head">
            <h2 class="persianFont myDirection">{{$course->title}}</h2>
            <p class="persianFont myDirection">{{$course->abstract}}</p>
        </div>
        <div class="about-grids">
            <div class="col-md-5 about-grid1 pull-right myDirection">
                <div class="about-img">
                    <img src="{{asset($course->pic)}}" class="img-responsive" alt="{{$course->title}}">
                </div>
            </div>
            <div class="col-md-7 about-grid pull-left myDirection">
                <h3 class="persianFont"> اطلاعات دوره </h3>
                {!! $course->information !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@if ($course->description!=null && $course->description!='')
<div class="services">
    <div class="container">
        <div class="gallery-top">
            <h2 class="persianFont myDirection"> شرح دوره </h2>
            <p class="persianFont myDirection"> این دوره شامل چه مواردی می شود </p>
        </div>
        <div class="about-grid persianFont myDirection">
            {{-- <h4 class="persianFont">سرفصل های این دوره</h4> --}}
            {!! $course->description !!}
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endif

<div class="gallery">
    <div class="container">
        <div class="gallery-top">
            <h2 class="persianFont myDirection">اساتید دوره </h2>
            <p class="persianFont myDirection"> اساتید برجسته ای که در تدریس این دوره با موسسه همکاری می کنند</p>
        </div>
        <div class="servies-top">
            <div class="container">
                @if ($course->teachers)
                    @php $index=0; @endphp
                    @foreach ($course->teachers as $teacher)
                        <div class="col-md-6 col-xs-12 listview_1_of_2">
                            <div class="images_1_of_2">
                                <div class="listimg col-md-4 col-xs-12 pull-right">
                                    <img src="{{asset($teacher->pic)}}" alt="{{$teacher->name}}">
                                </div>
                                <div class="text col-md-8 col-xs-12 pull-left persianFont" style="margin-top:3em;">
                                    <a class="no-style" href="{{url('teacher/'.$teacher->id)}}"><h3>{{$teacher->name}}</h3></a>
                                    <p>{{$teacher->title}}</p>
                                    <div class="button" style="margin-top:1em;">
                                        <span>
                                            <a href="{{url('teacher/'.$teacher->id)}}">اطلاعات بیشتر</a>
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
