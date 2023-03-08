@extends('layout.Customer.header-footer') 

@section('content')



<link rel="stylesheet" type="text/css" href="/css/Customer/landingpg.css">
<style>
    .intro{
    min-height: 100vh;
    width: 100%;
    background-image:url(/img/{{$intro -> img}});
    background-position: center;
    background-size: cover;
    position: relative;
    margin-bottom: 2vmin;
  }
</style>

<!-- INTRO -->
<section class="intro">
  <div class="intro-text">
    <h1>{{$intro -> heading}}</h1>
    <p>{{$intro -> text}}</p>
    <a href="#events" class="btn btn-outline-warning px-5 py-2">See Upcoming events</a>
  </div>
</section>

<!-- EVENTS- Carousel -->
<section id="events" class="events">
  <h1 class="heading">Upcoming events</h1>
        
  <div class="slider-container">
    <div class="slider owl-carousel">
      @foreach ($events as $event)
        <div class="card">
            <div class="img">
              <img src="/img/{{$event -> posterImg}}" alt="">
            </div>
            <div class="content">
              <div class="title">
                {{$event -> eventName}}
              </div>
              <div class="category">
                {{$event -> categoryName}}
              </div>
              <p>
                {{formatDate($event -> startDate)}}
              </p>
              <div class="btn">
                  <a href="/customer/events/{{$event -> eventID}}">Read More</a>
              </div>
            </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Testimonials -->

<section class="testimonials" id="testimonials">
    <h1 class="heading">Testimonials</h1>
    <!-- Testimonial-Box-containers -->
    <div class="testimonial-box-container">

      @foreach ($testimonials as $testimonial)
      @php
        $stars = getNoOfStars($testimonial -> rating);
      @endphp
        <div class="testimonial-box">
          <!-- Top -->
          <div class="box-top">
            <!-- Profile -->
            <div class="profile">
              <div class="profile-img">
                <img src="/img/{{$testimonial -> img}}" alt="Profile">
              </div>
              <div class="name-user">
                <strong>{{$testimonial -> fullname}}</strong>
                <span>{{$testimonial -> position}}</span>
              </div>
            </div>
              <!-- Reviews -->
            <div class="reviews">
              @for ($i=0; $i < $stars; $i++) 
                <i class="fas fa-star"></i> 
              @endfor
              @for ($j=5; $j > $stars; $j--)
                <i class="far fa-star"></i> 
              @endfor
            </div>  
          </div>
          <!-- Actual comments -->
          <div class="client-comment">
              <p>{{$testimonial -> testimonialDescription}}</p>
            </div>
        </div>
      @endforeach


    </div>   
</section>

<!-- BLOG SECTION on Home page -->
<section class="blog">
  <h1 style="color:#000;"class="heading">Blog</h1>
  <div class="blog-section">
    @foreach ($recommendations as $recommendation)
      <div class="blog-card card col-md-4">
        <div class="img">
          <img src="/img/{{$recommendation -> blogImg}}" alt="">
        </div>
        <div class="txt">
          <h3>{{$recommendation -> blogTitle}}</h3>
          <p>{{$recommendation -> blogQuote}}</p>
        </div>
        
        <a href="/customer/blogs/{{$recommendation -> blogID}}" class="btn btn-primary read-more">Read More</a>
      </div>
    @endforeach
    
  </div>
</section>

@endsection

