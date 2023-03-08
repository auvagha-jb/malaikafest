@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Services</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Services</h6>
        <div class="mt-3">
            <a class="btn btn-primary btn-icon-text btn-edit-profile" href="/admin/page/services/create">
                <i data-feather="edit" class="btn-icon-prepend"></i> Add Service
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table id="dataTableExample" class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Remove</th>
                        <th>Service</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>
                            <a class="btn btn-warning" style="color:white;" href="/admin/page/services/edit/{{$service -> serviceID}}"><i class="fas fa-pen"></i></a>
                        </td>
                        <td>
                            <form action="/admin/page/services/remove/{{$service -> serviceID}}" method="POST">
                                @csrf
                                <input id="isDeleted" type="number" name="isDeleted" value="1" hidden>
                                <input onclick="return confirm('This action will remove this listed service. Proceed?')"
                                class="btn btn-danger" type="submit" name="submit" value="Remove">
                            </form>
                        </td>
                        <td>{{$service -> title}}</td>
                        <td>{{$service -> description}}</td>
                        
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