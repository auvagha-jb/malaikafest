@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/services.css">

<section class="services">
      <div class="row">
        <h2 class="section-heading">Our Services</h2>
      </div>
      <div class="row">
        @foreach ($services as $service)
          <div class="column">
            <div class="card">
              <h3>{{$service -> title}}</h3>
              <p>
                {{$service -> description}}
              </p>
            </div>
          </div>  
        @endforeach
        
      </div>
</section>

@endsection