@extends('layouts.home')

@section('title')گالری@endsection

@section('header')
<link href="{{ asset('css/home/galleryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="fh5co-gallery">
    <a class="gallery-item" href="galleryImage/0">
        <img src="{{asset('images/galleries/fi.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
        <span class="overlay">
            <h2 class="persianFont myDirection">آموزش C#</h2>
            <span class="persianFont myDirection">3 عکس</span>
        </span>
    </a>
    <a class="gallery-item" href="galleryImage/0">
        <img src="{{asset('images/galleries/fi1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
        <span class="overlay">
            <h2 class="persianFont myDirection">آموزش چرم دوزی</h2>
            <span class="persianFont myDirection">6 عکس</span>
        </span>
    </a>
    <a class="gallery-item" href="galleryImage/0">
        <img src="{{asset('images/galleries/fi2.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
        <span class="overlay">
            <h2 class="persianFont myDirection">آموزش هلو</h2>
            <span class="persianFont myDirection">6 عکس</span>
        </span>
    </a>
    <a class="gallery-item" href="galleryImage/0">
        <img src="{{asset('images/galleries/fi3.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
        <span class="overlay">
            <h2 class="persianFont myDirection">آموزش پیانو</h2>
            <span class="persianFont myDirection">6 عکس</span>
        </span>
    </a>
    <a class="gallery-item" href="galleryImage/0">
        <img src="{{asset('images/galleries/fi4.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
        <span class="overlay">
            <h2 class="persianFont myDirection">آموزش حسابداری</h2>
            <span class="persianFont myDirection">2 عکس</span>
        </span>
    </a>
    @if ($galleries)
        @foreach ($galleries as $gallery)
            <a class="gallery-item" href="{{url('galleryImage/'.$gallery->id)}}">
                <img src="{{asset($gallery->pic)}}" alt="{{$gallery->title}}">
                <span class="overlay">
                    <h2 class="persianFont myDirection">{{$gallery->title}}</h2>
                    <span class="persianFont myDirection">{{$gallery->images->count()}} عکس</span>
                </span>
            </a>
        @endforeach
    @endif

</div>

<div class="clearfix"></div>
@endsection
