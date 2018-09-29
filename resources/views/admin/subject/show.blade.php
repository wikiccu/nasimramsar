@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات موضوع</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>
                        عنوان موضوع
                    </dt>
                    <dd>
                        {{$subject->title}}
                    </dd>
                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\SubjectController@edit', $subject['id'])}}" class="btn btn-primary"> تغییر موضوع </a> |
                <a href="{{url('admin\subject')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
