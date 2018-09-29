@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات رشته</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>
                        عنوان رشته
                    </dt>
                    <dd>
                        {{$field->title}}
                    </dd>
                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\FieldController@edit', $field['id'])}}" class="btn btn-primary"> تغییر رشته </a> |
                <a href="{{url('admin\field')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
