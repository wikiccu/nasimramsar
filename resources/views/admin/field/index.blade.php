@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست رشتهات</h3>
            <a href="{{url('admin\field\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> رشته جدید</a>
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
                    <th>عنوان رشته</th>
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
                            <td>
                                {{ $field->teachers->count()}}
                            </td>
                            <td>
                                {{ $field->courses->count()}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\FieldController@show', $field['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش رشته"></i>
                                </a>
                                <a href="{{action('Admin\FieldController@edit', $field['id'])}}">
                                    <i class="fa fa-edit" title="تغییر رشته"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/field/' . $field->id) }}" method="post"
                                    onsubmit="return confirm('از حذف رشته اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف رشته">
                                            <i class="fa fa-trash-o" title="حذف رشته"></i>
                                        </button>
                                </form>
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
