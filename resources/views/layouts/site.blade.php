<!DOCTYPE html>
<html lang="zxx">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Blog | @yield('title')</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Html5 Agency Template v1.0">

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/bootstrap/bootstrap.min.css') }}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/themify/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/magnific-popup/magnific-popup.css') }}">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/site/plugins/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
  
  <!--Favicon-->
  <link rel="icon" href="{{ asset('assets/site/images/favicon.png') }}" type="image/x-icon">

  @stack('style')

</head>

<body>

<!-- Header Start -->
<header class="navigation">
  <div class="header-top">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="header-top-info mb-2 mb-md-0 text-center text-md-left">
            <span class="text-white-50">Stories that inform and inspire</span>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 text-center text-md-right">
          <div class="header-top-info mb-0">
            @auth
              <a href="{{ url('/dashboard') }}"><i class="fas fa-user mr-2"></i><span>{{ Auth::user()->name }}</span></a>
            @else
              <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-2"></i><span>Login</span></a>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="navbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg px-0 py-4">
            <a class="navbar-brand" href="{{ url('/') }}">
              BLog<span>kit.</span>
            </a>
      
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
              aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
            </button>
      
            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('site-logout-form').submit();">
                      Logout
                    </a>
                    <form id="site-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                @else
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Header Close -->

@yield('content')

<footer class="footer section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="widget">
          <div class="logo mb-4">
            <h3>Blog<span>kit.</span></h3>
          </div>
          <p class="mb-3">Fresh stories, ideas and useful insights for curious readers.</p>
          <h6><a href="mailto:support@gmail.com">support@gmail.com</a></h6>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Quick Links</h4>
          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/') }}">All Blogs</a></li>
            @auth
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @else
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Stay connected</h4>
          <p>Follow us for the latest articles and updates.</p>
          <ul class="list-inline footer-socials mt-3">
            <li class="list-inline-item"><a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" aria-label="Github"><i class="fab fa-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-btm pt-4">
      <div class="row">
        <div class="col-12 text-center">
          <div class="copyright">
            Copyright &copy; {{ date('Y') }} Blogkit. Built by Nirob.
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
  <span class="icon fa fa-angle-up"></span>
</div>


<!-- 
Essential Scripts
=====================================-->
<!-- Main jQuery -->
<script src="{{ asset('assets/site/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4.3.1 -->
<script src="{{ asset('assets/site/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!--  Magnific Popup-->
<script src="{{ asset('assets/site/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('assets/site/plugins/slick/slick.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('assets/site/plugins/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/site/plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="{{ asset('assets/site/plugins/google-map/map.js') }}" defer></script>

<script src="{{ asset('assets/site/js/script.js') }}"></script>

@stack('script')

</body>

</html>