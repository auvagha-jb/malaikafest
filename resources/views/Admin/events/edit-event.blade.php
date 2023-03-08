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
<style>
    #previewImage 
    {
        max-width: 200px;
        height: auto;
    }
</style>

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Event</li>
  </ol>
</nav>

<form action="/admin/event/edit/{{$event -> eventID}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Event Here</h4>
          <!-- NAME -->
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Event Name</label>
            </div>
            <div class="col-lg-8">
              <input name="eventName" class="form-control" maxlength="35" name="defaultconfig" id="defaultconfig" type="text" value="{{$event -> eventName}}" required>
            </div>
          </div>
          <!-- CATEGORY -->
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Category</label>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <select class="js-example-basic-single w-100" name="eventCategory">
                    @foreach($categories as $category)
                      @php
                        $eventCategoryID = $category -> eventCategoryID;
                        $eventCategory = $event -> eventCategory;
                      @endphp
                      <option value="{{$category -> eventCategoryID}}" 
                        @if($eventCategoryID == $eventCategory)selected @endif>
                        {{$category -> categoryName}}
                      </option>
                    @endforeach
                    </select>
                </div>
            </div>
          </div>
          <!-- DATES-->
          <div class="form-group row">
            <div class="col">
              <label>Start Date:</label>
              <input value="{{$event -> startDate}}" name="startDate" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy/mm/dd"/>
            </div>
            <div class="col-md-6">
              <label>End Date:</label>
              <input value="{{$event -> endDate}}" name="endDate" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy/mm/dd"/>
            </div>
          </div>
          <!-- TIMES -->
          <div class="form-group row">
            <div class="col">
              <label>Start Time (24 hour):</label>
              <input value="{{$event -> startTime}}" name="startTime" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:mm" />
            </div>
            <div class="col-md-6">
              <label>End Time (24 hour):</label>
              <input value="{{$event -> endTime}}" name="endTime"class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:mm" />
            </div>
          </div>
          <!-- TicketPrice and Location -->
          <div class="form-group row">
            <div class="col-md-6">
              <label>Ticket Price (KSH.):</label>
              <input value="{{$event -> ticketPrice}}" name="ticketPrice" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'integer'"/>
            </div>
            <div class="col-md-6">
              <label>Location:</label>
              <input value="{{$event -> location}}" name="location" class="form-control"/>
            </div>
          </div>
          
          <h4 class="card-title">Event Description</h4>
              <textarea class="form-control" name="eventDescription" id="tinymceExample" rows="10">{{$event -> eventDescription}}</textarea>
          <br>

          <h6 class="card-title">Poster Image</h6>

          <img id="previewImage" src="/img/{{$event -> posterImg}}" alt="Image preview">

          <div class="form-group">
            <input type="file" class="file-upload-default" accept="image/png, image/jpeg, image/jpg" name="posterImg" onchange="readURL(this);">
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