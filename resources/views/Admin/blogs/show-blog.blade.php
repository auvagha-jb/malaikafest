@extends('layout.master')

@section('content')
<div class="profile-page tx-13">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="col-md-6 col-xl-6 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="card-title mb-0">Blog Title</h6>
          </div>
          <p>{{$blog-> blogTitle}}</p>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Blog Category:</label>
            <p class="text-muted">{{$blog -> blogCategory}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Blog Quote:</label>
            <p class="text-muted">{{$blog -> blogQuote}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Created At</label>
            <p class="text-muted">{{$blog -> created_at}}</p>
          </div>
          <br>
            <div class="mt-3">
                <a class="btn btn-primary btn-icon-text btn-edit-profile" href="/admin/blog/edit/{{$blog -> blogID}}">
                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit Blog content
                </a>
            </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->

    <!-- middle wrapper start -->
    <div class="col-md-6 col-xl-6 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-body">
            <div class="mt-3">
                <label class="tx-40 font-weight-bold mb-0 text-uppercase">Blog Text</label>
            </div>
            {!! html_entity_decode($blogText) !!}
              <img class="img-fluid" src="/img/{{$blog -> blogImg}}" alt="BlogIMG">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>
</div>
@endsection