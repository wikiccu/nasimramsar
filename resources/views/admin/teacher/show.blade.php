@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات استاد</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">

                    <dt>
                        تصویر استاد
                    </dt>
                    <dd>
                        <img src="{{$teacher->pic===''?asset('images/no-image.png'):asset($teacher->pic)}}"  class="img-rounded" alt="no Image Available">
                    </dd>

                    <dt>
                        عنوان استاد
                    </dt>
                    <dd>
                        {{$teacher->title}}
                    </dd>

                    <dt>
                        خلاصه استاد
                    </dt>
                    <dd>
                        {{$teacher->abstract}}
                    </dd>

                    <dt>
                        اطلاعات استاد
                    </dt>
                    <dd>
                        {!! $teacher->information !!}
                    </dd>

                    <dt>
                        درباره ی  استاد
                    </dt>
                    <dd>
                        {!! $teacher->description !!}
                    </dd>

                    <dt>
                        موضوع  استاد
                    </dt>
                    <dd>
                        {{$teacher->field->title}}
                    </dd>

                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\CourseController@edit', $teacher['id'])}}" class="btn btn-primary"> تغییر استاد </a> |
                <a href="{{url('admin\teacher')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
