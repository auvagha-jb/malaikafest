@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Events</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">ALL EVENTS</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>View</th>
                <th>Poster</th>
                <th>Name</th>
                <th>Dates</th>
                <th>Times</th>
                <th>Ticket Price (Ksh.)</th>
                <th>Location</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            @php
              $startDate = formatDate($event -> startDate);
              $endDate = formatDate($event -> endDate);
              $startTime = $event -> startTime;
              $endTime = $event -> endTime;
            @endphp
              <tr>
                <td>
                  <a class="btn btn-info" style="color:white;" href="/admin/event/{{$event -> eventID}}"><i class="fas fa-eye"></i></a>
                </td>
                <td>
                  <img src="/img/{{$event -> posterImg}}" alt="PosterIMG">
                </td>
                <td>{{$event -> eventName}}</td>
                <td>{{$startDate}} - {{$endDate}}</td>
                <td>{{$event -> startTime}} - {{$event -> endTime}}</td>
                <td>{{$event -> ticketPrice}}</td>
                <td>{{$event -> location}}</td>
                <td>{{$event -> eventCategory}}</td>
                <td>
                  <form action="/admin/event/remove/{{$event -> eventID}}" method="POST">
                    @csrf
                    <input id="isDeleted" type="number" name="isDeleted" value="1" hidden>
                    <input onclick="return confirm('This action will remove this Event. Proceed?')"
                    class="btn btn-danger" type="submit" name="submit" value="Remove">
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
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