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
    <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
    <li class="breadcrumb-item"><a href="/admin/page/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
  </ol>
</nav>

<form action="/admin/page/home/testimonial/create" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Testimonial Here</h4>
            <!-- NAME, ROLE -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Full Names:</label>
                    <input name="fullname" class="form-control" type="text" placeholder="John Doe" required>
                </div>

                <div class="col-md-6">
                    <label>Position:</label>
                    <input name="position" class="form-control" type="text" placeholder="Manager at Uber Eats" required>
                </div>  
            </div>

            <!-- RATING -->
            <div class="form-group row">
              <div class="col-md-4"> 
                <span class="details">Rating (/10):</span>
                <select id="Rating:" name="rating">
                  <optgroup>
                    @for ($i = 1; $i <= 10; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </optgroup>
                </select>
              </div>
            </div>

            <!-- DESCRIPTION -->
            <div class="form-group row">
              <div class="col-md-12">
                  <label>Description:</label>
                  <input name="description" class="form-control" type="text" placeholder="Type something..." required>
              </div>
            </div>

            <!-- IMG -->
            <h6 class="card-title">Testimonial Profile Image</h6>
            <input type="file" id="myDropify" class="border" accept="image/png, image/jpeg, image/jpg" name="img" />

            <div class="form-group mb-5 row">
                <input class="btn btn-primary p-3 mx-auto" style="font-size:15pt;" type="submit" value="Add Testimonial">
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
@endpush