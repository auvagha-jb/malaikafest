@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
  </ol>
</nav>

<!-- ABOUT US -->
<div class="col-md-12 col-xl-12 middle-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
        <div class="card rounded">
            <div class="card-body">
                <div class="mt-3">
                    <label class="tx-40 font-weight-bold mb-0 text-uppercase"></label>
                </div>
                <div class="mt-3">
                    <a class="btn btn-warning btn-icon-text btn-edit-profile" href="/admin/page/about/edit">
                        <i data-feather="edit" class="btn-icon-prepend"></i> Edit Location
                    </a>
                </div>

                <div class="mt-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.046892763057!2d36.81425!3d-1.31863735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1056c8277fa1%3A0xb4526fb3c6c6f763!2sT-Mall!5e0!3m2!1sen!2ske!4v1675719430181!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
        
            </div>
        </div>
        </div>
    </div>
</div
    

@endsection

@push('plugin-scripts')
    <!-- DATATABLES -->
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- FONT AWESOME ICONS -->
    <script src="https://kit.fontawesome.com/4a33c5baa2.js" crossorigin="anonymous"></script> 
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush