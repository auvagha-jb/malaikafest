@extends('layout.Customer.header-footer') 

@section('content')

<link rel="stylesheet" type="text/css" href="/css/Customer/blog/dashboard.css">

    <!-- Top blog Section Begin -->
    <section class="top-blog spad">
        <div class="section-title">
            <h5>Top blogs this Week</h5>
        </div>
        <div class="container po-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-blog-item large-item">
                        <div class="top-blog-img set-bg" data-setbg="/img/{{$blogs1 -> blogImg}}">
                        </div>
                        <div class="text">
                            <div class="cat-name">{{$blogs1 -> categoryName}}</div>
                            <a href="/customer/blogs/{{$blogs1 -> blogID}}">
                                <h4>{{$blogs1 -> blogTitle}}</h4>
                            </a>
                            <p>{{$blogs1 -> blogQuote}}...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                        @foreach($blogs2 as $blogs)
                        <div class="card">
                            <div class="top-blog-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="top-blog-img set-bg" data-setbg="/img/{{$blogs -> blogImg}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text">
                                            <div class="cat-name">{{$blogs -> categoryName}}</div>
                                            <a href="/customer/blogs/{{$blogs -> blogID}}">
                                                <h4>{{$blogs -> blogTitle}}</h4>
                                            </a>
                                            <p>{{$blogs -> blogQuote}}....</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="row button">
        <div class="col-md-12">
            <a href="/customer/blogs/all" class="btn btn-primary px-5 py-2">See All Blogs</a>
        </div>
    </div>
    

    <!-- Categories Feature blog Section Begin -->
    <section class="categories-feature-blog spad">
        <div class="section-title">
            <h5>Featured blogs</h5>
        </div>
        <div class="container po-relative">
            <div class="row">
                <div class="col-lg-7">
                    @foreach($blogs3 as $blogs)
                    <div class="card">
                        <div class="blog-item">
                            <div class="blog-item-img set-bg" data-setbg="/img/{{$blogs -> blogImg}}">
                            </div>
                            <div class="text">
                                <div class="cat-name">{{$blogs -> categoryName}}</div>
                                <a href="/customer/blogs/{{$blogs -> blogID}}">
                                    <h4>{{$blogs -> blogTitle}}</h4>
                                </a>
                                <p>{{$blogs -> blogQuote}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 offset-lg-1">
                    @foreach($blogs4 as $blogs)
                    <div class="card">
                        <div class="cfr-small-item">
                            <a href="/customer/blogs/{{$blogs -> blogID}}"><img src="/img/{{$blogs -> blogImg}}" alt=""></a>
                            <div class="cfr-small-text">
                                <div class="cat-name">{{$blogs -> categoryName}}</div>
                                <h6>{{$blogs -> blogTitle}}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script src="/js/Customer/blog.js"></script>
    <script>
            (function ($) {

/*------------------
    Background Set
--------------------*/
$('.set-bg').each(function () {
    var bg = $(this).data('setbg');
    $(this).css('background-image', 'url(' + bg + ')');
});


})(jQuery);
    </script>
@endsection