@extends('layout.master')

@section('content')
@php
  $startDate = formatDate($event -> startDate);
  $endDate = formatDate($event -> endDate);
@endphp
<div class="profile-page tx-13">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="col-md-6 col-xl-6 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="card-title mb-0">Event Name</h6>
          </div>
          <p>{{$event -> eventName}}</p>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Event Category:</label>
            <p class="text-muted">{{$event -> eventCategory}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Dates:</label>
            <p class="text-muted">{{$startDate}} - {{$endDate}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Times:</label>
            <p class="text-muted">{{$event -> startTime}} - {{$event -> endTime}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Location:</label>
            <p class="text-muted">{{$event -> location}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Ticket Price:</label>
            <p class="text-muted">KSH. {{$event -> ticketPrice}}</p>
          </div>
          <br>
            <div class="mt-3">
                <a class="btn btn-primary btn-icon-text btn-edit-profile" href="/admin/event/edit/{{$event -> eventID}}">
                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit Event details
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
                <label class="tx-40 font-weight-bold mb-0 text-uppercase">Event Description</label>
            </div>
            {!! html_entity_decode($eventDescription) !!}
              <img class="img-fluid" src="/img/{{$event -> posterImg}}" alt="PosterIMG">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>
</div>
@endsection