@extends('layout.master')

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
  <!-- Page content here -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Event Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Add Category</li>
  </ol>
</nav>

<section class="addcategory">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add New Event Category</h6>
            <form class="forms-sample" action="/admin/event/category/add" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                  <label for="category" class="col-sm-3 col-form-label">Category Name</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="category" placeholder="e.g. Seminar">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Add</button>
              <button class="btn btn-light">Cancel</button>
            </form>
        </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
@endpush