@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست پیام ها</h3>
            {{--  <a href="{{url('admin\message\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> پیام جدید</a>  --}}
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
                    <th>نام فرستنده</th>
                    <th>ایمیل فرستنده</th>
                    <th>زمان ارسال</th>
                    <th>تنظیمات</th>
                </tr>
                @if($messages)
                    @foreach ($messages as $message)

                        <tr>
                            <td>
                                {{ $message->name}}
                            </td>
                            <td>
                                {{ $message->email}}
                            </td>
                            <td>
                                {{ $message->created_at->diffForHumans() }}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\MessageController@show', $message['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش پیام"></i>
                                </a>
                                {{--  <a href="{{action('Admin\MessageController@edit', $message['id'])}}">
                                    <i class="fa fa-edit" title="تغییر پیام"></i>
                                </a>  --}}
                                <form style="display:inline;" action="{{ url('admin/message/' . $message->id) }}" method="post"
                                    onsubmit="return confirm('از حذف پیام اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف پیام">
                                            <i class="fa fa-trash-o" title="حذف پیام"></i>
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
