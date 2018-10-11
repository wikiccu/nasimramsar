@extends('layouts.home')

@section('title'){{$gallery->title}}@endsection


@section('content')

<!-- about -->
<div class="about">
    <div class="container">
        <div class="about-head">
            <h2 class="persianFont myDirection"> تصاویر گالری </h2>
            <!-- <p class="persianFont myDirection"> در باره موسسه نسیم رامسر</p> -->
        </div>
        <div class="about-grids">

            <div class="col-md-12 about-grid persianFont myDirection">
                <h3 class="persianFont myDirection">{{$gallery->title}}</h3>
                <div style="margin: 2em 0">
                {!! $gallery->body !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                @if ($gallery->images)
                    @foreach ($gallery->images as $image)
                        <figure>
                            <img class="img-responsive center-block" src="{{asset($image->pic)}}" alt="{{$image->title}}">
                            <figcaption class="persianFont text-center">{{$image->title}}</figcaption>
                        </figure>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
