@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item"><a href="#">Footer</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Footer Information</li>
  </ol>
</nav>

<form action="/admin/page/footer/edit" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Footer Information</h4>
            <!-- WHO WE ARE -->
            <div class="form-group row">
                <div class="col-md-12">
                    <label>Who We Are:</label>
                    <input name="aboutDescription" class="form-control" type="text" value="{{$footer -> aboutDescription}}" required>
                </div>
            </div>

            <!-- LOCATION AND PHONENUMBER -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Location:</label>
                    <input name="location" class="form-control" type="text" value="{{$footer -> location}}" required>
                </div>
                <div class="col-md-6">
                    <label>Mobile Phone Number:</label>
                    <input name="phoneNo" class="form-control" type="text" value="{{$footer -> phoneNo}}" required>
                </div>
            </div>

            <!-- EMAIL AND IG links -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Email Address:</label>
                    <input name="email" class="form-control" type="text" value="{{$footer -> emailAddress}}" required>
                </div>
                <div class="col-md-6">
                    <label>Instagram:</label>
                    <input name="ig" class="form-control" type="text" value="{{$footer -> igLink}}" required>
                </div>
            </div>

            <!-- TWITTER AND FB links -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Twitter:</label>
                    <input name="twitter" class="form-control" type="text" value="{{$footer -> twitterLink}}" required>
                </div>
                <div class="col-md-6">
                    <label>Facebook:</label>
                    <input name="fb" class="form-control" type="text" value="{{$footer -> fbLink}}" required>
                </div>
            </div>

            <!-- YT link -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Youtube:</label>
                    <input name="yt" class="form-control" type="text" value="{{$footer -> ytLink}}" required>
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
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
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
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush