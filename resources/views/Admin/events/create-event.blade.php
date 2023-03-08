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
    <li class="breadcrumb-item"><a href="#">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Event</li>
  </ol>
</nav>

<form action="/admin/event/create" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Event Here</h4>
          <!-- NAME -->
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Event Name</label>
            </div>
            <div class="col-lg-8">
              <input name="eventName" class="form-control" maxlength="35" name="defaultconfig" id="defaultconfig" type="text" placeholder="Type Something.." required>
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
                        <option value="{{$category -> eventCategoryID}}">{{$category -> categoryName}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
          </div>
          <!-- DATES-->
          <div class="form-group row">
            <div class="col">
              <label>Start Date:</label>
              <input name="startDate" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy/mm/dd"/>
            </div>
            <div class="col-md-6">
              <label>End Date:</label>
              <input name="endDate" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy/mm/dd"/>
            </div>
          </div>
          <!-- TIMES -->
          <div class="form-group row">
            <div class="col">
              <label>Start Time (24 hour):</label>
              <input  name="startTime" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:mm" />
            </div>
            <div class="col-md-6">
              <label>End Time (24 hour):</label>
              <input  name="endTime"class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:mm" />
            </div>
          </div>
          <!-- TicketPrice and Location -->
          <div class="form-group row">
            <div class="col-md-6">
              <label>Ticket Price (KSH.):</label>
              <input name="ticketPrice" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'integer'"/>
            </div>
            <div class="col-md-6">
              <label>Location:</label>
              <input name="location" class="form-control"/>
            </div>
          </div>
          
          <h4 class="card-title">Event Description</h4>
              <textarea class="form-control" name="eventDescription" id="tinymceExample" rows="10"></textarea>
          <br>

          <h6 class="card-title">Poster Image</h6>
          <input type="file" id="myDropify" class="border" accept="image/png, image/jpeg, image/jpg" name="posterImg" />

          <div class="form-group mb-5 row">
            <input class="btn btn-primary p-3 mx-auto" style="font-size:15pt;" type="submit" value="Submit">
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