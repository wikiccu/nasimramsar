@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">موضوع جدید</h3>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="{{url('admin/subject')}}">
            @csrf
            <div class="box-body">
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>

                <div class="form-group">
                    <label for="title" class="control-label">عنوان موضوع</label>
                    <input id="title" name="title" class="form-control" placeholder="عنوان موضوع" />
                    <span for="title" class="text-danger"></span>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
</div>

@endsection
