@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

@endpush

@section('content')

<style>
    #previewImage 
    {
        max-width: 200px;
        height: auto;
    }
</style>

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Blogs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
  </ol>
</nav>

<form action="/admin/blog/edit/{{$blog -> blogID}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Blog Here</h4>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Blog Title</label>
            </div>
            <div class="col-lg-8">
              <input name="blogTitle" class="form-control" maxlength="35" name="defaultconfig" id="defaultconfig" type="text" value="{{$blog -> blogTitle}}"  required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Category</label>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <select class="js-example-basic-single w-100" name="blogCategory">
                    @foreach($categories as $category)
                      @php
                        $blogCategoryID = $category -> blogCategoryID;
                        $blogCategory = $blog -> blogCategory;
                      @endphp
                      <option value="{{$category -> blogCategoryID}}" 
                        @if($blogCategoryID == $blogCategory)selected @endif>
                        {{$category -> categoryName}}
                      </option>
                    @endforeach
                    </select>
                </div>
            </div>
          </div>
          <h4 class="card-title">Blog Text</h4>
              <textarea class="form-control" name="blogText" id="tinymceExample" rows="10">{{$blog -> blogText}}</textarea>
          <br>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Blog Quote</label>
            </div>
            <div class="col-lg-8">
              <input name="blogQuote" class="form-control" maxlength="100" name="defaultconfig" id="defaultconfig" type="text" value="{{$blog -> blogQuote}}"  required>
            </div>
          </div>

          <h6 class="card-title">Blog Image</h6>

          <img id="previewImage" src="/img/{{$blog -> blogImg}}" alt="Image preview">

          <div class="form-group">
            <input type="file" class="file-upload-default" accept="image/png, image/jpeg, image/jpg" name="blogImg" onchange="readURL(this);">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>


          <div class="form-group mb-5 row">
            <input class="btn btn-primary p-3 mx-auto" style="font-size:15pt;" type="submit" value="Update">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush