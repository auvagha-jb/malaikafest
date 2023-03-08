@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/blog/singlepg.css">

<style>
    .blogcover
    {
		width: 100%;
		height: auto;
		background-image: url(/img/{{$blog -> blogImg}});
		background-position: 0 -19rem;
		background-size: 100%;
		position: relative;
		margin-bottom: 50px;
	}
</style>

<div class="blogcover">
			<div class="content text-center">
				<span>{{formatDate($blog -> created_at)}}</span>
				<h1>{{$blog -> blogTitle}}</h1>
			</div>
</div>

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-text">
                    <div class="blog-desc">
                        {!! html_entity_decode($blogText) !!}
                        <div class="blog-quote">
                            <p>"{{$blog -> blogQuote}}"</p>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="category col-md-12">
                                <ul class="tags">
                                    <a href=""><li>{{$blog -> categoryName}}</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comment">
                        <h3>Comments</h3>
                        @foreach($comments as $comment)
                            <div class="single-comment">
                                <!-- <img src="img/blog-comment.png" alt=""> -->
                                <ul>
                                    <li>{{$comment -> username}}</li>
                                    <li>{{formatDate($comment -> created_at)}}</li>
                                </ul>
                                <p>{{$comment -> comment}}</p>
                            </div>
                        @endforeach
                        
                    </div>
                    <form action="/customer/blogs/add/comment" method="POST" class="comment-form">
                        @CSRF
                        <h3>Leave a Comment</h3>
                        <div class="row">
                            <input type="text" name="blogID" value="{{$blog -> blogID}}" hidden>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your name" name="username">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your email" name="email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Comment" name="comment"></textarea>
                            </div>
                        </div>
                        <button type="submit">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Similar Blog Section Begin -->
<section class="similar-blog spad">
    <div class="container">
        <div class="row">
            @foreach($recommendations as $recommendation)
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="/img/{{$recommendation -> blogImg}}" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">{{$recommendation -> categoryName}}</div>
                            <a href="/customer/blogs/{{$recommendation -> blogID}}"><h6>{{$recommendation -> blogTitle}}</h6></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Similar Blog Section End -->   

@endsection
