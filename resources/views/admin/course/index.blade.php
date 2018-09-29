@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست دوره ها</h3>
            <a href="{{url('admin\course\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> دوره جدید</a>
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
                    {{--  <th>تصویر دوره</th>  --}}
                    <th>عنوان دوره</th>
                    <th>موضوع دوره</th>
                    <th>درباره ی دوره</th>
                    <th>تنظیمات</th>
                </tr>
                @if($courses)
                    @foreach ($courses as $course)

                        <tr>
                            {{--  <td>
                                {{ $course->pic}}
                            </td>  --}}
                            <td>
                                {{ $course->title}}
                            </td>
                            <td>
                                {{ $course->field->title}}
                            </td>
                            <td>
                                {{ $course->abstract}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\CourseController@show', $course['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش دوره"></i>
                                </a>
                                <a href="{{action('Admin\CourseController@edit', $course['id'])}}">
                                    <i class="fa fa-edit" title="تغییر دوره"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/course/' . $course->id) }}" method="post"
                                    onsubmit="return confirm('از حذف دوره اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف دوره">
                                            <i class="fa fa-trash-o" title="حذف دوره"></i>
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
