@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">دوره جدید</h3>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
        @endif
        <!-- form start -->
        <form role="form" method="post" action="{{url('admin/course')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>

                <div class="form-group">
                    <label for="Name" class="control-label">تصویر دوره</label>
                    <div>
                      <img id="inputImage" onclick="$('#pic').trigger('click');" style="cursor: pointer;width: auto;height: 180px;"
                        src="{{asset('images/no-image.png')}}" class="img-rounded" alt="no Image Available">
                      <input id="pic" name="pic" type="file" onchange="GetImage()" style="display: none" />
                    </div>
                    <script>
                        function GetImage() {
                            try {
                              var input = document.getElementById("pic");
                              if (input.files && input.files[0]) {
                                //var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                                var fileExtension = ['jpg'];
                                if ($.inArray(input.value.split('.')[input.value.split('.').length - 1].toLowerCase(), fileExtension) === -1) {
                                  $("#pic").val("");
                                  showAppMessage("فایل ها تنها با فرمت تصویر مجاز می باشند. " + fileExtension.join(', '), "warning");
                                }
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                  $('#inputImage').attr('src', e.target.result);
                                  changeImage = true;
                                }
                                reader.readAsDataURL(input.files[0]);
                              }
                            } catch (e) {
                              showAppMessage(e.statusMessage, "error");
                            }
                        };
                    </script>
                </div>

                <div class="form-group">
                    <label for="title" class="control-label">عنوان دوره</label>
                    <input id="title" name="title" class="form-control" placeholder="عنوان دوره" />
                    <span for="title" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="abstract" class="control-label">خلاصه دوره</label>
                    <textarea id="abstract" name="abstract" class="form-control" placeholder="خلاصه دوره" ></textarea>
                    <span for="abstract" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="information" class="control-label">اطلاعات دوره</label>
                    <textarea id="information" name="information" class="form-control" placeholder="اطلاعات دوره" ></textarea>
                    <span for="information" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label">درباره ی دوره</label>
                    <textarea id="description" name="description" class="form-control" placeholder="درباره ی دوره" ></textarea>
                    <span for="description" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="field_id" class="control-label">موضوع دوره</label>
                    <select id="field_id" name="field_id" class="form-control">
                      @if($fields)
                        @foreach ($fields as $field)
                          <option value="{{$field->id}}">{{$field->title}}</option>
                        @endforeach
                      @endif
                    </select>
                    <span for="field_id" class="text-danger"></span>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
</div>

@endsection
