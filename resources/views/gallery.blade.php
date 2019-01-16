@extends('layouts.home')

@section('title')گالری@endsection

@section('header')
<link href="{{ asset('css/home/galleryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="fh5co-gallery">
    @if ($galleries)
        @foreach ($galleries as $gallery)
            <a class="gallery-item" href="{{url('galleryImage/'.$gallery->id)}}">
                <img src="{{asset($gallery->pic)."?".time() }}" alt="{{$gallery->title}}">
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
