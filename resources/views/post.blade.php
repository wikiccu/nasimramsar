@extends('layouts.home')

@section('title'){{$page_title}}@endsection

@section('content')
<div class="about">
    <div class="container">
        <div class="about-grids">
            <div class="col-md-4 col-xs-12 pull-right">
                <div class="col-md-12 listview_1_of_2">
                    <div class="text col-md-12 pull-left persianFont">
                        <h3 style="text-align: center;"> موضوع خبر ها و مقالات</h3>
                        <ul class="subject">
                            <li>
                                <a href="{{url('news')}}">
                                    <h4>همه اخبار و مقالات</h4>
                                    <span class="badge pull-left">{{$all_posts_number}}</span>
                                </a>
                            </li>
                            @if ($subjects)
                                @foreach ($subjects as $subject)
                                    <li>
                                        <a href="{{url('news/'.$subject->id)}}">
                                            <h4>{{$subject->title}}</h4>
                                            <span class="badge pull-left">{{$subject->posts->count()}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="col-md-8 col-xs-12 pull-left">
                <div class="col-md-12 listview_1_of_2">
                    <div class="images_1_of_2 big_pic">

                        @if($post)
                            <div class="listimg col-xs-12 pull-right">
                                <img src="{{asset($post->pic)}}" alt="">
                            </div>
                            <div class="text col-xs-12 pull-left persianFont subject">
                                <h3>{{$post->title}}</h3>
                                <p>
                                    @if($post->user)
                                    <i class="glyphicon glyphicon-user"></i> توسط {{$post->user->name}}،
                                    @endif
                                    <i class="glyphicon glyphicon-calendar"></i> {{$post->makeDate()}}</p>
                                <p>{{$post->Abstract}}</p>
                            </div>
                            <div class="col-md-12 persianFont mainArticle">
                                <p class="">{!! $post->body !!}</p>
                            </div>
                        @else
                            <h3 class="persianFont"> {{$page_title}} </h3>
                        @endif

                        <div class="clearfix"> </div>
                    </div>
                </div>


                <div class="col-md-8 contact-form">
                    <a href="{{url('news')}}" class="persianFont btn-style"> باز گشت به اخبار و مقالات</a>
                </div>

                <div class="clearfix"></div>
            </div>


        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
