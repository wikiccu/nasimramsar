@extends('layouts.admin')

@section('content')
<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات دوره</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post"  action="{{ url('admin/course/' . $course->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="box-body">
                    <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                    <input name="Id" id="Id" type="hidden" value="{{$course->id}}" />

                    <div class="form-group">
                        <label for="Name" class="control-label">تصویر دوره</label>
                        <div>
                          <img id="inputImage" onclick="$('#pic').trigger('click');" style="cursor: pointer;width: auto;height: 180px;"
                            src="{{$course->pic===''?asset('images/no-image.png'):asset($course->pic)}}" class="img-rounded" alt="no Image Available">
                          <input id="pic" name="pic" type="file" onchange="GetImage()" style="display: none" />
                        </div>
                        <script>
                            function GetImage() {
                                try {
                                  var input = document.getElementById("pic");
                                  if (input.files && input.files[0]) {
                                        //var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                                    var fileExtension = ['jpg'];
                                    if ($.inArray(input.value.split('.')[input.value.split('.').length - 1].toLowerCase(), fileExtension) === -1) {                                          $("#pic").val("");
                                      alert("فایل ها تنها با فرمت تصویر مجاز می باشند. " + fileExtension.join(', '));
                                    }
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                      $('#inputImage').attr('src', e.target.result);
                                      changeImage = true;
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                  }
                                } catch (e) {
                                    alert(e.statusMessage);
                                    }
                                };
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">عنوان دوره</label>
                        <input id="title" name="title" class="form-control" value="{{$course->title}}"/>
                        <span for="title" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="abstract" class="control-label">خلاصه دوره</label>
                        <textarea id="abstract" name="abstract" class="form-control" placeholder="خلاصه دوره" >{{$course->abstract}}</textarea>
                        <span for="abstract" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="information" class="control-label">اطلاعات دوره</label>
                        <textarea id="information" name="information" class="form-control" placeholder="اطلاعات دوره" >{{$course->information}}</textarea>
                         <span for="information" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">درباره ی دوره</label>
                        <textarea id="description" name="description" class="form-control" placeholder="درباره ی دوره" >{{$course->description}}</textarea>
                        <span for="description" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="field_id" class="control-label">موضوع دوره</label>
                        <select id="field_id" name="field_id" class="form-control">
                           @if($fields)
                            @foreach ($fields as $field)
                              <option value="{{$field->id}}" @if($field->id==$course->field_id) 'selected' @endif >{{$field->title}}</option>
                            @endforeach
                          @endif

                          {{--  <?php if($field->id==$course->field_id){echo 'selected';} ?>  --}}
                        </select>
                        <span for="field_id" class="text-danger"></span>
                    </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ذخیره</button> |
                    <a href="{{url('admin\course')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
                </div>
            </form>
        </div>
    </div>
@endsection
