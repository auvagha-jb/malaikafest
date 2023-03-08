@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Pages</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">ALL PAGES</h6>
        <div class="table-responsive">
            <table id="dataTableExample" class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>View</th>
                        <th>Page</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a class="btn btn-info" style="color:white;" href="/admin/page/home"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>Home</td>
                    </tr>

                    <tr>
                        <td>
                            <a class="btn btn-info" style="color:white;" href="/admin/page/services"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>Services</td>
                    </tr>

                    <tr>
                        <td>
                            <a class="btn btn-info" style="color:white;" href="/admin/page/about"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>About</td>
                    </tr>
{{-- 
                    <tr>
                        <td>
                            <a class="btn btn-info" style="color:white;" href="/admin/page/contact"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>Contact</td>
                    </tr> --}}

                    <tr>
                        <td>
                            <a class="btn btn-info" style="color:white;" href="/admin/page/footer"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>Footer</td>
                    </tr>
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