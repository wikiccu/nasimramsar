@extends('layouts.admin')

@section('content')

<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات گالری</h3>
            </div>

            <div class="box-body">
                <dl class="dl-horizontal">

                    <dt>
                        عنوان گالری
                    </dt>
                    <dd>
                        {{$gallery->title}}
                    </dd>

                    <dt>
                        درباره ی گالری
                    </dt>
                    <dd>
                        <div class="well clearfix" style="clear: both;">
                            {!! $gallery->body !!}
                        </div>
                    </dd>

                    <dt>
                        تصاویر  گالری
                    </dt>
                    <dd>
                        {{--  {{$gallery->images}}  --}}
                    </dd>

                </dl>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{action('Admin\GalleryController@edit', $gallery['id'])}}" class="btn btn-primary"> تغییر گالری </a> |
                <a href="{{url('admin\gallery')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
            </div>
        </div>
    </div>

@endsection
