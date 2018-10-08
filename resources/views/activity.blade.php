@extends('layouts.home')

@section('title')فعالیت های ما@endsection

@section('header')
<link href="{{ asset('css/home/index.css') }}" rel="stylesheet">
@endsection

@section('content')

<!--gallery-->
<div class="gallery">
    <div class="container">
        <div class="gallery-top">
            <h2 class="persianFont myDirection">فعالیت ها </h2>
            <p class="persianFont myDirection"> موسسه فرهنگی هنری نسیم رامسر طیف متنوعی از فعالیت ها و خدمات را ارائه می کند.</p>
        </div>
        <ul class="simplefilter myDirection persianFont">
            <li class="active" data-filter="all">همه دوره ها</li>
            @if($fields)
                @foreach ($fields as $field)
                <li data-filter="{{$field->id}}">{{$field->title}} </li>
                @endforeach
            @endif
        </ul>

        <div class="filtr-container">
            @if($courses)
                @foreach ($courses as $course)
                    <div class="col-md-4 filtr-item" data-category="{{$course->field_id}}" data-sort="">
                        <a href="url('course/'.{{$course->id}})" class="b-link-stripe b-animate-go swipebox">
                            <div class="ed-gal-effect slow-zoom horizontal">
                                <div class="img-box">
                                    <img src="{{$course->pic}}" alt="{{$course->title}}" />
                                </div>
                                <div class="ed-text-box">
                                    <div class="ed-gal-text">
                                        <h4 class="persianFont myDirection">{{$course->title}}</h4>
                                        <p class="persianFont myDirection">{{$course->abstract}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            <div class="clearfix"></div>
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
