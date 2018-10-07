@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات پیام</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>
                        نام فرستنده
                    </dt>
                    <dd>
                        {{$message->name}}
                    </dd>
                    <dt>
                        ایمیل فرستنده
                    </dt>
                    <dd>
                        {{$message->email}}
                    </dd>
                    <dt>
                        پیام فرستنده
                    </dt>
                    <dd>
                        {{$message->body}}
                    </dd>
                    <dt>
                        آی پی فرستنده
                    </dt>
                    <dd>
                        {{$message->ip}}
                    </dd>
                    <dt>
                        زمان ارسال
                    </dt>
                    <dd>
                        {{$message->created_at}}
                    </dd>

                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {{--  <a href="{{action('Admin\MessageController@edit', $message['id'])}}" class="btn btn-primary"> تغییر پیام </a> |  --}}
                <a href="{{url('admin\message')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
