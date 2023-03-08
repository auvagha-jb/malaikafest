@extends('layout.master')

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
  <!-- Page content here -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Blog Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Add Blog Category</li>
  </ol>
</nav>

<section class="addcategory">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add New Blog Category</h6>
            <form class="forms-sample" action="/admin/blog/category/add" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                  <label for="category" class="col-sm-3 col-form-label">Blog Category Name</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="category" placeholder="e.g. Commercial">
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