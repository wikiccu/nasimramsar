@extends('layouts.admin')

@section('header')
<link href="{{ asset('froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet">
<link href="{{ asset('froala-editor/css/froala_style.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">گالری جدید</h3>
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
        <form role="form" method="post" action="{{url('admin/gallery')}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>

                <div class="form-group">
                    <label for="title" class="control-label">عنوان گالری</label>
                    <input id="title" name="title" class="form-control" placeholder="عنوان گالری" />
                    <span for="title" class="text-danger"></span>
                </div>


                <div class="form-group">
                    <label for="body" class="control-label">درباره ی گالری</label>
                    <textarea id="body" name="body" class="form-control" placeholder="درباره ی گالری" >
                    </textarea>
                    <span for="body" class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="pics">عکس های گالری</label>
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                انتخاب عکس ها <input id="uploadPic" style="display: none;" onchange="GetImage(this)" multiple="multiple" type="file">
                            </span>
                        </label>
                        <input id="uploadPicLog" class="form-control" readonly="readonly" type="text">
                    </div>
                </div>
                <div id="uploadPicWell" class="hidden well clearfix"></div>

                <div class="form-group">
                    <label for="course_id" class="control-label">دوره مربوطه</label>
                    <select id="course_id" name="course_id" class="form-control">
                        <option value="">-- انتخاب دوره --</option>
                      @if($courses)
                        @foreach ($courses as $course)
                          <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                      @endif
                    </select>
                    <span for="course_id" class="text-danger"></span>
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
        $('#body').froalaEditor({
            // Set the image upload URL.
            imageUploadURL: '/UploadFile',

            direction: 'rtl',
            language: 'fa',
            heightMin: 200,

            imageUploadParams: {
                id: 'my_editor_body_creat_gallery',
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
              id: 'my_editor_body_creat_gallery',
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

    function GetImage(input) {
        try {
            //var input2 = document.getElementById("uploadPic");
            if(input.files){
                $('#uploadPicLog').val(input.files.length>1?input.files.length + ' فایل انتخاب شده':input.files[0].name)
                $('#uploadPicWell').removeClass('hidden').html("");;
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                var i;
                var filename;
                console.log(input.value)
                for (i = 0; i < input.files.length; i++) {
                    console.log(input.files[i]);
                    filename=input.files[i].name.toLowerCase();
                    if($.inArray(filename.split('.')[filename.split('.').length-1].toLowerCase(), fileExtension)===-1){
                        //not good
                        console.log("not image");
                    }else{
                        console.log("its image");
                        var reader = new FileReader();
                        reader.readAsDataURL(input.files[i]);
                        reader.onload = function (e) {
                            //$('#inputImage').attr('src', e.target.result);
                            var child = '<div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive img-thumbnail" src='+e.target.result+' ></div>';
                            $('#uploadPicWell').append(child)
                        }
                    }
                }
            }
        } catch (e) {
          console.log(e.statusMessage);
        }
    };
</script>
@endsection
