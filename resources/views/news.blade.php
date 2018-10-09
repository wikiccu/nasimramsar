@extends('layouts.home')

@section('title')اخبار و مقالات@endsection

@section('content')
<div class="about">
    <div class="container">
        <div class="about-head">
            <h2 class="persianFont myDirection"> اخبار و مقالات </h2>
            <p class="persianFont myDirection">{{$this_subject}}</p>
        </div>
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
                @if ($posts)
                    @foreach ($posts as $post)
                        <div class="col-md-12 listview_1_of_2">
                            <div class="images_1_of_2">
                                <div class="listimg col-md-4 col-xs-12 pull-right">
                                    <img src="{{asset($post->pic)}}" alt="{{$post->title}}">
                                </div>
                                <div class="text col-md-8 col-xs-12 pull-left persianFont">
                                    <h3>{{$post->title}}</h3>
                                    <p>
                                        @if($post->user)
                                        <i class="glyphicon glyphicon-user"></i> توسط {{$post->user->name}}،
                                        @endif
                                        <i class="glyphicon glyphicon-calendar"></i> {{$post->created_at}}</p>
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
                    @endforeach
                @endif
                <!-- <div class="col-md-4 contact-form">
                    <a href="#" class="persianFont btn-style"> خبر های بیشتر </a>
                </div> -->
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
