@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>

<!-- HOME INTRO -->
<div class="col-md-12 col-xl-12 middle-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
        <div class="card rounded">
            <div class="card-body">
                <div class="mt-3">
                    <label class="tx-40 font-weight-bold mb-0 text-uppercase">Home Intro Text</label>
                </div>
                <div class="mt-3">
                    <a class="btn btn-warning btn-icon-text btn-edit-profile" href="/admin/page/home/edit">
                        <i data-feather="edit" class="btn-icon-prepend"></i> Edit Home Intro
                    </a>
                </div>
                <p class="font-weight-bold">{{$intro -> heading}} </p>
                {{$intro -> text}}
                <img class="img-fluid" style="width: 70%" src="/img/{{$intro -> img}}" alt="IntroIMG">
            </div>
        </div>
        </div>
    </div>
</div>
    
<!-- TESTIMONIALS -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Testimonials</h6>
        <div class="mt-3">
            <a class="btn btn-primary btn-icon-text btn-edit-profile" href="/admin/page/home/testimonial/create">
                <i data-feather="edit" class="btn-icon-prepend"></i> Add Testimonial
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table id="dataTableExample" class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Fullname</th>
                        <th>Position</th>
                        <th>Rating</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>
                                <a class="btn btn-warning" style="color:white;" href="/admin/page/home/testimonial/edit/{{$testimonial -> testimonialID}}"><i class="fas fa-pen"></i></a>
                            </td>
                            <td>
                                <form action="/admin/page/home/testimonial/remove/{{$testimonial -> testimonialID}}" method="POST">
                                    @csrf
                                    <input id="isDeleted" type="number" name="isDeleted" value="1" hidden>
                                    <input onclick="return confirm('This action will remove this testimonial. Proceed?')"
                                    class="btn btn-danger" type="submit" name="submit" value="Remove">
                                </form>
                            </td>
                            <td><img src="/img/{{$testimonial -> img}}" alt="testimonialIMG"></td>
                            <td>{{$testimonial -> fullname}}</td>
                            <td>{{$testimonial -> position}}</td>
                            <td>{{$testimonial -> rating}} / 10</td>
                            <td>{{$testimonial -> testimonialDescription}}</td>
                            
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