@extends('layout.master')

@push('plugin-styles')


@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Forms</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editors</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">TinyMCE</h4>
        <p class="card-description">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official TinyMCE Documentation </a>for a full list of instructions and other options.</p>
        <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
      </div>
    </div>
  </div>
</div>


@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>

@endpush