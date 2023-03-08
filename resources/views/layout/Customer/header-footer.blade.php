@php
    use App\Models\Eventcategories;
    use App\Models\Footer;
    $categories = Eventcategories::where('isDeleted', '0')->get();
    $footer = Footer::first();
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Landing Page</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/Customer/header-footer.css">
    <!-- FONT AWESOME -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> -->
</head>



<header>


    <div class="wrapper">
        {{-- TOPBAR --}}
        <div class="topbar hoc clear col-md-12">
            <ul class="nospace">
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
                <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Till number: 0000000</a></li>
                <li><a href="#">Ticket Verification</a></li>
            </ul>
        </div>

        {{-- MAIN HEADER --}}
        <nav class="fixed-top">
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo">
                    <a href="{{ route('landingPage') }}">
                        <img src="/img/logo.jpg" alt="LOGO">
                    </a>
                </div>
                <ul class="links">
                    <li>
                        <input type="checkbox" id="show-Categories">
                        <label for="show-Categories">Categories</label>
                        <ul class="dropdown">
                            <li><a href="/customer/events/all">See all events</a></li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="/customer/events/filter/{{ $category->eventCategoryID }}">{{ $category->categoryName }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="/customer/blogs">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
            <form action="#" class="search-box">
                <input type="text" placeholder="Type Something to Search..." required>
                <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
            </form>
    </div>
    </nav>
    </div>
</header>

<body class="antialiased">
    <br><br>
    @yield('content')
    <!-- Blade directive allowing us to yield a specific section -->
</body>

<footer>
    <div class="main-content">
        <div class="left box">
            <h2>Who we Are?</h2>
            <div class="content">
                <p>{{ $footer->aboutDescription }}</p>
                <div class="social">
                    <a href="{{ $footer->fbLink }}"><span class="fab fa-facebook-f"></span></a>
                    <a href="{{ $footer->twitterLink }}"><span class="fab fa-twitter"></span></a>
                    <a href="{{ $footer->igLink }}"><span class="fab fa-instagram"></span></a>
                    <a href="{{ $footer->ytLink }}"><span class="fab fa-youtube"></span></a>
                </div>
            </div>
        </div>
        <div class="center box">
            <h2>Address</h2>
            <div class="content">
                <div class="place">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">{{ $footer->location }}</span>
                </div>
                <div class="phone">
                    <span class="fas fa-phone-alt"></span>
                    <span class="text">{{ $footer->phoneNo }}</span>
                </div>
                <div class="email">
                    <span class="fas fa-envelope"></span>
                    <span class="text">{{ $footer->emailAddress }}</span>
                </div>
            </div>
        </div>
        <div class="right box">
            <h2>Contact us</h2>
            <div class="content">
                <form action="#">
                    <div class="email">
                        <div class="text">Email *</div>
                        <input type="email" required>
                    </div>
                    <div class="msg">
                        <div class="text">Message *</div>
                        <textarea rows="2" cols="25" required></textarea>
                    </div>
                    <div class="button">
                        <button class="btn btn-light" style="width: 100%;font-size: 1.0625rem;font-weight: 500;"
                            type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bottom">
        <center>
            <span class="credit">Created By <a href="#">Digipedia LTD</a> | </span>
            <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
    </div>
</footer>

</html>

<!-- FONT AWESOME ICONS -->
<script src="https://kit.fontawesome.com/4a33c5baa2.js" crossorigin="anonymous"></script>
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/js/Customer/eventcarousel.js"></script>
