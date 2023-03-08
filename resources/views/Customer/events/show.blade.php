@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/events/singlepg.css">

<div id="page">
    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap" style="padding-top:90px;">
                <div class="col-sm-7">
                    <img style="width:80%; max-width:100%; margin-bottom:20px;" src="/img/{{$event -> posterImg}}">
                </div>
                <div class="col-sm-5 card">
                    <div class="product-desc">
                        <h3>{{$event -> eventName}}</h3>
                        <p class="price">KSH. {{$event -> ticketPrice}}/=</p>
                        <p class="description">{!! html_entity_decode($eventDescription) !!}</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-equipment"><i class="fas fa-receipt"></i> Pay now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

