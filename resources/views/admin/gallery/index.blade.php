@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">لیست گالری ها</h3>
            <a href="{{url('admin\gallery\create')}}" class="btn btn-primary pull-left" style="margin-right: 1em;"><i class="fa fa-plus"></i> گالری جدید</a>
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
                    {{--  <th>تصویر گالری</th>  --}}
                    <th>عنوان گالری</th>
                    <th>دوره مربوطه</th>
                    <th>تعداد تصاویر</th>
                    <th>تنظیمات</th>
                </tr>
                @if($gallerys)
                    @foreach ($gallerys as $gallery)

                        <tr>
                            {{--  <td>
                                {{ $gallery->pic}}
                            </td>  --}}
                            <td>
                                {{ $gallery->title}}
                            </td>
                            <td>
                                @if($gallery->course)
                                    {{$gallery->course->title}}
                                @endif
                            </td>
                            <td>
                                {{ $gallery->images->count()}}
                            </td>
                            <td class="operation-td">
                                <a href="{{action('Admin\GalleryController@show', $gallery['id'])}}">
                                    <i class="fa fa-list-alt" title="نمایش گالری"></i>
                                </a>
                                <a href="{{action('Admin\GalleryController@edit', $gallery['id'])}}">
                                    <i class="fa fa-edit" title="تغییر گالری"></i>
                                </a>
                                <form style="display:inline;" action="{{ url('admin/gallery/' . $gallery->id) }}" method="POST"
                                    onsubmit="return confirm('از حذف گالری اطمینان دارید؟');">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="linkButton" title="حذف گالری">
                                            <i class="fa fa-trash-o" title="حذف گالری"></i>
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
