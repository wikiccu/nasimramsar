@extends('layouts.admin')

@section('header')
<link href="{{ asset('froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet">
<link href="{{ asset('froala-editor/css/froala_style.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات گالری</h3>
            </div>
            <!-- form start -->
            <form role="form" method="POST"  action="{{ url('admin/gallery/' . $gallery->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="box-body">
                    <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                    <input name="Id" id="Id" type="hidden" value="{{$gallery->id}}" />


                    <div class="form-group">
                        <label for="Name" class="control-label">تصویر گالری</label>
                        <div>
                          <img id="inputImage" onclick="$('#pic').trigger('click');" style="cursor: pointer;width: auto;height: 180px;"
                            src="{{$gallery->pic===''?asset('images/no-image.png'):asset($gallery->pic)}}" class="img-rounded" alt="no Image Available">
                          <input id="pic" name="pic" type="file" onchange="GetImage()" style="display: none" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">عنوان گالری</label>
                        <input id="title" name="title" class="form-control" value="{{$gallery->title}}"/>
                        <span for="title" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="body" class="control-label">درباره ی گالری</label>
                        <textarea id="body" name="body" class="form-control" placeholder="درباره ی گالری" >{{$gallery->body}}</textarea>
                        <span for="body" class="text-danger"></span>
                    </div>



                    <div class="form-group">
                        <label for="pics">عکس های جدید گالری</label>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    انتخاب عکس ها <input id="uploadPics[]" name="uploadPics[]" style="display: none;" onchange="GetImages(this)" multiple="multiple" type="file">
                                </span>
                            </label>
                            <input id="uploadPicsLog" class="form-control" readonly="readonly" type="text">
                        </div>
                    </div>
                    <div id="uploadPicsWell" class="hidden well clearfix"></div>

                    <div class="form-group">
                        <label for="course_id" class="control-label">دوره مربوطه</label>
                        <select id="course_id" name="course_id" class="form-control">
                            <option value="">-- انتخاب دوره --</option>
                            @if($courses)
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}" @if($course->id==$gallery->course_id) selected @endif>{{$course->title}}</option>
                            @endforeach
                            @endif
                        </select>
                        <span for="course_id" class="text-danger"></span>
                    </div>

                </div>


                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ذخیره</button> |
                    <a href="{{url('admin\gallery')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
                </div>

            </form>

        </div>

        @if($gallery->images)
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">عکس های فعلی گالری</h3>
                </div>
                <div class="form-group">
                        <div class="well clearfix">
                            @foreach ($gallery->images as $image)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="thumbnail">
                                        <img class="img-responsive img-thumbnail" src="{{asset($image->pic)}}" >
                                        <div class="caption">
                                                <p>{{$image->title}}</p>
                                                <form method="POST"  action="{{ url('/deleteGalleryImage') }}"
                                                    onsubmit="return confirm('از حذف تصویر اطمینان دارید؟');">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" id="id" name="id" value="{{$image->id}}">
                                                    <input type="hidden" id="gallery_id" name="gallery_id" value="{{$image->gallery_id}}">
                                                    <button class="btn btn-danger" title="حذف گالری">
                                                        <i class="fa fa-trash-o" title="حذف تصویر"></i> حذف تصویر
                                                    </button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('scripts')
<script src="{{ asset('froala-editor/js/froala_editor.pkgd.min.js') }}" defer></script>
<script type="">
      $(document).ready(function () {
        $('#body').froalaEditor({
            imageUploadURL: '/UploadFile',
            direction: 'rtl',
            language: 'fa',
            heightMin: 200,

            imageUploadParams: {
                id: 'my_editor_body_edit_gallery',
                location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
            },
        })
        .on('froalaEditor.image.removed', function (e, editor, $img) {
            $.ajax({
            method: "POST",
            url: "{{url('/deletefile')}}",
            data: {
                id: 'my_editor_body_edit_gallery',
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

    function GetImages(input) {
        try {
            //var input2 = document.getElementById("uploadPics");
            if(input.files){
                $('#uploadPicsLog').val(input.files.length>1?input.files.length + ' فایل انتخاب شده':input.files[0].name)
                $('#uploadPicsWell').removeClass('hidden').html("");;
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
                            $('#uploadPicsWell').append(child)
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
