@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/about.css">

<style>
    .about-section
    {
    background: url(/img/{{$aboutus -> img}}) no-repeat left;
    background-size: 56%;
    background-color: #fdfdfd;
    overflow: hidden;
    padding: 100px 0;
    }
</style>

{{-- ABOUT --}}
<section class="about-section">
        <div class="inner-container">
            <h1>{{$aboutus -> title}}</h1>
            <p class="text">
                {{$aboutus -> description}}
            </p>
        </div>
</section>

{{-- TEAM --}}
<section>
    <div class="row">
    <h1>Our Team</h1>
    </div>
    <div class="row">

        @foreach ($team as $member)
            <div class="column">
                <div class="card">
                <div class="img-container">
                    <img src="/img/{{$member -> memberImg}}" />
                </div>
                <h3>{{$member -> fullname}}</h3>
                <p>{{$member -> role}}</p>
                <div class="icons">
                    <a href="{{$member -> twitter_link}}">
                    <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{$member -> linkedin_link}}">
                    <i class="fab fa-linkedin"></i>
                    </a>
                </div>
                </div>
            </div>
        @endforeach
        
    </div>
</section>

@endsection