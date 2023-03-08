@extends('layout.master')

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
        {{-- <li class="breadcrumb-item"><a href="/admin/page/footer">About</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Footer</li>
    </ol>
</nav>

<div class="profile-page tx-13">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="col-md-12 col-xl-12 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="card-title mb-0">Who We Are</h6>
          </div>
          <p>{{$footer -> aboutDescription}}</p>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Location:</label>
            <p class="text-muted">{{$footer -> location}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Mobile Phone Number:</label>
            <p class="text-muted">{{$footer -> phoneNo}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email Address:</label>
            <p class="text-muted">{{$footer -> emailAddress}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Facebook Link:</label>
            <p class="text-muted">{{$footer -> fbLink}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Instagram Link:</label>
            <p class="text-muted">{{$footer -> igLink}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Twitter Link:</label>
            <p class="text-muted">{{$footer -> twitterLink}}</p>
          </div>

          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Youtube Link:</label>
            <p class="text-muted">{{$footer -> ytLink}}</p>
          </div>

          <br>

            <div class="mt-3">
                <a class="btn btn-primary btn-icon-text btn-edit-profile" href="/admin/page/footer/edit">
                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit Footer Information
                </a>
            </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
  </div>
</div>
@endsection