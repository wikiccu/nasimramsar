@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست اساتید</h3>
            <a href="{{url('admin\teacher\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> استاد جدید</a>
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
                    {{--  <th>تصویر استاد</th>  --}}
                    <th>نام استاد</th>
                    <th>عنوان استاد</th>
                    <th>درباره ی استاد</th>
                    <th>تنظیمات</th>
                </tr>
                @if($teachers)
                    @foreach ($teachers as $teacher)

                        <tr>
                            {{--  <td>
                                {{ $teacher->pic}}
                            </td>  --}}
                            <td>
                                {{ $teacher->name}}
                            </td>
                            <td>
                                {{ $teacher->title}}
                            </td>
                            <td>
                                {{ $teacher->abstract}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\TeacherController@show', $teacher['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش استاد"></i>
                                </a>
                                <a href="{{action('Admin\TeacherController@edit', $teacher['id'])}}">
                                    <i class="fa fa-edit" title="تغییر استاد"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/teacher/' . $teacher->id) }}" method="post"
                                    onsubmit="return confirm('از حذف استاد اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف استاد">
                                            <i class="fa fa-trash-o" title="حذف استاد"></i>
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
