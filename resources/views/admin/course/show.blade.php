@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات دوره</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>
                        عنوان دوره
                    </dt>
                    <dd>
                        {{$course->title}}
                    </dd>
                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\CourseController@edit', $course['id'])}}" class="btn btn-primary"> تغییر دوره </a> |
                <a href="{{url('admin\course')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
