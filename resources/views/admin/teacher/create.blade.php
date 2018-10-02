@extends('layouts.admin')

@section('header')
<link href="{{ asset('froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet">
<link href="{{ asset('froala-editor/css/froala_style.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">استاد جدید</h3>
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
        <form role="form" method="post" action="{{url('admin/teacher')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>

                <div class="form-group">
                    <label for="Name" class="control-label">تصویر استاد</label>
                    <div>
                      <img id="inputImage" onclick="$('#pic').trigger('click');" style="cursor: pointer;width: auto;height: 180px;"
                        src="{{asset('images/no-image.png')}}" class="img-rounded" alt="no Image Available">
                      <input id="pic" name="pic" type="file" onchange="GetImage()" style="display: none" />
                    </div>

                </div>

                <div class="form-group">
                    <label for="title" class="control-label">عنوان استاد</label>
                    <input id="title" name="title" class="form-control" placeholder="عنوان استاد" />
                    <span for="title" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="abstract" class="control-label">خلاصه استاد</label>
                    <textarea id="abstract" name="abstract" class="form-control" placeholder="خلاصه استاد" ></textarea>
                    <span for="abstract" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="information" class="control-label">اطلاعات استاد</label>
                    <textarea id="information" name="information" class="form-control" placeholder="اطلاعات استاد" >
                        <h5><i class="fa fa-calendar-check-o"></i>&nbsp;<span>شروع استاد: هفته اول تیرماه</span></h5>
                        <h5><i class="fa fa-calendar"></i>&nbsp;<span>طول استاد: 10 جلسه (استاد مقدماتی)، 10 جلسه (استاد پیشرفته)</span></h5>
                        <h5><i class="fa fa-users"></i>&nbsp;<span>نوع استاد: خصوصی، نیمه خصوصی و عمومی</span></h5>
                        <h5><i class="fa fa-dollar"></i>&nbsp;<span>شهریه استاد: بنا بر نوع تشکیل کلاس ها متفاوت می باشد</span></h5>
                    </textarea>
                    <span for="information" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label">درباره ی استاد</label>
                    <textarea id="description" name="description" class="form-control" placeholder="درباره ی استاد" >
                            <dl class="dlclass">
                                <h4>سرفصل های استاد:</h4>
                                <ul>
                                    <li>سرفصل اول</li>
                                    <li>سرفصل دوم</li>
                                </ul>
                            </dl>
                    </textarea>
                    <span for="description" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="field_id" class="control-label">موضوع استاد</label>
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

@section('scripts')
<script src="{{ asset('froala-editor/js/froala_editor.pkgd.min.js') }}" defer></script>
<script type="">
      $(document).ready(function () {
        $('#information').froalaEditor({
            // Set the image upload URL.
            //imageUploadURL: '/uploadfile',
            imageUploadURL: '{{url('/uploadfile')}}',

            direction: 'rtl',
            language: 'fa',
            heightMin: 200,

            imageUploadParams: {
                id: 'my_editor_information_creat_teacher',
                location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
            },
            //requestHeaders: {
            //    'XSRF-TOKEN': $('input:hidden[name="_token"]').val()
            //},

            // URL to get all department images from
            //imageManagerLoadURL: '/fileuploads',
            // Set the delete image request URL.
            //imageManagerDeleteURL: "/fileuploads",
            // Set the delete image request type.
            //imageManagerDeleteMethod: "DELETE",
            //imageManagerDeleteParams: {
            //    _token: "{{ csrf_token() }}"
            //}
        })
        // Catch image remove
      .on('froalaEditor.image.removed', function (e, editor, $img) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "{{url('/deletefile')}}",

          // Request params.
          data: {
            id: 'my_editor_information_creat_teacher',
            src: $img.attr('src'),
            _token: "{{ csrf_token() }}"
          }
        })
        .done (function (data) {
          console.log ('image was deleted');
        })
        .fail (function () {
          console.log ('image delete problem');
        })
      });




        $('#description').froalaEditor({
            // Set the image upload URL.
            imageUploadURL: '/UploadFile',

            direction: 'rtl',
            language: 'fa',
            heightMin: 200,

            imageUploadParams: {
                id: 'my_editor_description_creat_teacher',
                location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
            },
        })// Catch image remove
        .on('froalaEditor.image.removed', function (e, editor, $img) {
          $.ajax({
            // Request method.
            method: "POST",

            // Request URL.
            url: "{{url('/deletefile')}}",

            // Request params.
            data: {
              id: 'my_editor_description_creat_teacher',
              src: $img.attr('src'),
              _token: "{{ csrf_token() }}"
            }
          })
          .done (function (data) {
            console.log ('image was deleted');
          })
          .fail (function () {
            console.log ('image delete problem');
          })
        });


    });

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
@endsection
