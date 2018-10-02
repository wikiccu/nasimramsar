@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست خبر ها</h3>
            <a href="{{url('admin\post\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> خبر جدید</a>
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
                    {{--  <th>تصویر خبر</th>  --}}
                    <th>عنوان خبر</th>
                    <th>موضوع خبر</th>
                    <th>درباره ی خبر</th>
                    <th>تنظیمات</th>
                </tr>
                @if($posts)
                    @foreach ($posts as $post)

                        <tr>
                            {{--  <td>
                                {{ $post->pic}}
                            </td>  --}}
                            <td>
                                {{ $post->title}}
                            </td>
                            <td>
                                {{ $post->subject->title}}
                            </td>
                            <td>
                                {{ $post->abstract}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\PostController@show', $post['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش خبر"></i>
                                </a>
                                <a href="{{action('Admin\PostController@edit', $post['id'])}}">
                                    <i class="fa fa-edit" title="تغییر خبر"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/post/' . $post->id) }}" method="post"
                                    onsubmit="return confirm('از حذف خبر اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف خبر">
                                            <i class="fa fa-trash-o" title="حذف خبر"></i>
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
