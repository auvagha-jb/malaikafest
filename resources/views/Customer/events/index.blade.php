@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/events/all.css">
<br><br>
<section class="event-section spad">
    <div class="container">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4 col-sm-12">
                    <div class="card event-item">
                        <a href="/customer/events/{{$event -> eventID}}"><img src="/img/{{$event -> posterImg}}" alt=""></a>
                        <div class="text">
                            <div class="category">{{$event -> categoryName}}</div>
                            <a href="/customer/events/{{$event -> eventID}}">
                                <h4>{{$event -> eventName}}</h4>
                            </a>
                            <p>KSH. {{$event -> ticketPrice}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="event-pagination">
                    <a href="#" class="active">01</a>
                    <a href="#">02</a>
                    <a href="#">03</a>
                    <a href="#">04</a>
                    <a href="#">Next</a>
                </div>
            </div>
        </div> -->
    </div>
</section>

<script src="/js/Customer/event.js"></script>

@endsection


