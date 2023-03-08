@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/blog/allblogs.css">

<div class="wrapper-tags">
      <div class="icon"><i id="left" class="fa-arrow-left"></i></div>
      <ul class="tabs-box">
        @foreach($categories as $category)
        <a style="text-decoration:none;" href="/customer/blogs/filter/{{$category -> blogCategoryID}}">
            <li class="tab">{{$category -> categoryName}}</li>
        </a>
            
        @endforeach
        <!-- <li class="tab">Coding</li>
        <li class="tab active">JavaScript</li>
        <li class="tab">Podcasts</li>
        <li class="tab">Databases</li>
        <li class="tab">Web Development</li>
        <li class="tab">Unboxing</li>
        <li class="tab">History</li>
        <li class="tab">Programming</li>
        <li class="tab">Gadgets</li>
        <li class="tab">Algorithms</li>
        <li class="tab">Comedy</li>
        <li class="tab">Gaming</li>
        <li class="tab">Share Market</li>
        <li class="tab">Smartphones</li>
        <li class="tab">Data Structure</li> -->
      </ul>
      <div class="icon"><i id="right" class="fa-arrow-right"></i></div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-sm-12">
                    <div class="card blog-item">
                        <a href="/customer/blogs/{{$blog -> blogID}}"><img src="/img/{{$blog -> blogImg}}" alt=""></a>
                        <div class="text">
                            <div class="category">{{$blog -> categoryName}}</div>
                            <a href="/customer/blogs/{{$blog -> blogID}}">
                                <h4>{{$blog -> blogTitle}}</h4>
                            </a>
                            <p>{{$blog -> blogQuote}}...</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="blog-pagination">
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

<script src="/js/Customer/blog.js"></script>

@endsection


