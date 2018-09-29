@extends('layouts.admin')

@section('content')
<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات رشته</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post"  action="{{ url('admin/field/' . $field->id) }}">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="box-body">
                    <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                    <input name="Id" id="Id" type="hidden" value="{{$field->id}}" />

                    <div class="form-group">
                        <label for="Title" class="control-label">عنوان رشته</label>
                        <input id="Title" name="Title" class="form-control" value="{{$field->title}}"/>
                        <span for="Title" class="text-danger"></span>
                    </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ذخیره</button> |
                    <a href="{{url('admin\field')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
                </div>
            </form>
        </div>
    </div>
@endsection
