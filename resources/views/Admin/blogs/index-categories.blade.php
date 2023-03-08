@extends('layout.master')

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
  <!-- Page content here -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Blog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Blog Categories</li>
  </ol>
</nav>

<section class="categories">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Blog Categories</h6>
            <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <th>{{$category -> blogCategoryID}}</th>
                      <td>{{$category -> categoryName}}</td>
                      <td>
                        <form action="/admin/blog/category/remove/{{$category -> blogCategoryID}}" method="POST">
                              @csrf
                              <input id="isDeleted" type="number" name="isDeleted" value="1" hidden>
                              <input onclick="return confirm('This action will remove this blog category from the list. Proceed?')"
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
</section>
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
@endpush