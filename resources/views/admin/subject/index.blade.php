@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست موضوع ها</h3>
            <a href="{{url('admin\subject\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> موضوع جدید</a>
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
                    <th>تعداد خبر</th>
                    <th>تنظیمات</th>
                </tr>
                @if($subjects)
                    @foreach ($subjects as $subject)

                        <tr>
                            <td>
                                {{ $subject->title}}
                            </td>
                            <td>
                                {{ $subject->posts->count()}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\SubjectController@show', $subject['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش موضوع"></i>
                                </a>
                                <a href="{{action('Admin\SubjectController@edit', $subject['id'])}}">
                                    <i class="fa fa-edit" title="تغییر موضوع"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/subject/' . $subject->id) }}" method="post"
                                    onsubmit="return confirm('از حذف موضوع اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف موضوع">
                                            <i class="fa fa-trash-o" title="حذف موضوع"></i>
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
