@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست موضوعات</h3>
            <a href="{{url('admin\field\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> موضوع جدید</a>
            <div class="pull-left">
                <div id="searchBox" class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover persian-table table-striped table-bordered">
                <tr>
                    <th>عنوان موضوع</th>
                    <th>تعداد استاد</th>
                    <th>تعداد مقاله</th>
                    <th>تنظیمات</th>
                </tr>
                @if($fields)
                    @foreach ($fields as $field)

                        <tr>
                            <td>
                                {{ $field->title}}
                            </td>
                            <td></td>
                            <td></td>
                            <td class="operation-td">
                                <a href="./Details">
                                    <i class="fa fa-list-alt" title="نمایش موضوع"></i>
                                </a>
                                <a href="./Edit">
                                    <i class="fa fa-edit" title="تغییر موضوع"></i>
                                </a>
                                <a href="./Delete">
                                    <i class="fa fa-trash-o" title="حذف موضوع"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

@endsection
