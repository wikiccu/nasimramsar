@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات خبر</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">

                    <dt>
                        تصویر خبر
                    </dt>
                    <dd>
                        <img src="{{$post->pic===''?asset('images/no-image.png'):asset($post->pic)}}"  class="img-rounded" alt="no Image Available">
                    </dd>

                    <dt>
                        عنوان خبر
                    </dt>
                    <dd>
                        {{$post->title}}
                    </dd>

                    <dt>
                        خلاصه خبر
                    </dt>
                    <dd>
                        {{$post->abstract}}
                    </dd>

                    <dt>
                        متن خبر
                    </dt>
                    <dd>
                        <div class="well clearfix" style="clear: both;">
                            {!! $post->body !!}
                        </div>
                    </dd>

                    <dt>
                        موضوع  خبر
                    </dt>
                    <dd>
                        {{$post->field->title}}
                    </dd>

                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\PostController@edit', $post['id'])}}" class="btn btn-primary"> تغییر خبر </a> |
                <a href="{{url('admin\post')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
