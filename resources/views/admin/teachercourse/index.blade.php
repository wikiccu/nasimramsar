@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست اساتید</h3>
            {{-- <a href="{{url('admin\teacher\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> استاد جدید</a> --}}
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
                    <th>نام استاد</th>
                    <th>دوره های استاد</th>
                    <th>تنظیمات</th>
                </tr>
                @if($teachers)
                    @foreach ($teachers as $teacher)

                        <tr>
                            <td>
                                {{ $teacher->name}}
                            </td>
                            <td>
                                @if($teacher->courses)
                                <table class="table table-hover persian-table table-striped table-bordered">
                                    @foreach ($teacher->courses as $course)
                                    <tr><td>
                                            {{$course->title}}
                                        <form style="display: inline;float:left" action="{{ url('admin/teachercourse/' . $teacher->id) }}" method="post"
                                            onsubmit="return confirm('از حذف استاد اطمینان دارید؟');">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input name="teacher_id" type="hidden" value="{{$teacher->id}}">
                                                <input name="course_id" type="hidden" value="{{$course->id}}">
                                                <button class="linkButton" title="حذف دوره استاد">
                                                    <i class="fa fa-trash-o" title="حذف دوره استاد"></i>
                                                </button>
                                        </form>
                                    </td></tr>
                                    @endforeach
                                </table>
                                @endif
                            </td>
                            <td class="operation-td">
                                {{-- <a href="{{action('Admin\TeacherController@show', $teacher['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش دوره های استاد"></i>
                                </a> --}}
                                {{-- <a href="{{action('Admin\TeacherController@edit', $teacher['id'])}}">
                                    <i class="fa fa-edit" title="تغییر "></i>
                                </a> --}}
                                <a onclick="showModel({{$teacher->id}},{{$course->id}},'{{$teacher->name}}')">
                                    <i class="fa fa-plus" title="دوره جدید برای استاد "></i>
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

@section('scripts')
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">دوره جدید برای استاد <span id="teacher_name"></span></h4>
        </div>
        <form method="POST" action="{{ url('admin/teachercourse/') }}">
            @csrf
            <div class="modal-body">
                <input type="hidden" id="teacher_id" name="teacher_id" value="">
                <div class="form-group">
                    <label for="course_id" class="col-form-label">دوره جدید</label>
                    <select id="course_id" name="course_id" class="form-control">
                        @if($courses)
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
function showModel(teacher_id,course_id,teacher_name){
    console.log(teacher_id+' - '+course_id);
    $('#teacher_name').text(teacher_name);
    $('#myModal #teacher_id').val(teacher_id);
    $('#myModal').modal('show')
}
</script>
@endsection
