<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://kit.fontawesome.com/23c9455052.js" crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shizuru&display=swap" rel="stylesheet">


    <style>

        @media(max-width: 1600px){
            .row{
                --bs-gutter-x: 0rem;
            }

            body{
                font-family: "century gothic";
                background-color: rgb(78, 62, 62);
            }

            .navbar{
                background-color: rgba(233, 20, 20, 0.795);
                /* opacity: 0.75 !important; */
                padding-left: .5%;
                padding-top: 1%;
            }

            nav .navbar-nav li a{
                color: white;
            }

            nav .navbar-nav li{
                padding-top: 1%;
            }

            .navbar-dark .nav-link:hover{
                background-color: rgba(255, 255, 255, 0.705) !important;
                color: black !important;
                transition: transform .4s;
                transform: scale(1.2);

            }

            .logo{
                font-weight: bold;
                font-size: 30px;
                color: wheat !important;
                padding-top: 0;
                font-family: 'Shizuru', cursive;
            }

            .nav-link{
                color: white !important;
            }

            footer{
                border-top: 1px solid wheat;
                color: white;
                background-color: rgb(53, 48, 48);
                /* background-color: rgba(161, 33, 33, 0.76); */
                padding-top: 1%;
                padding-bottom: 1%;
                margin-bottom: 0;
            }

            div .dropdown-menu{
                background-color: rgba(233, 20, 20, 0.795);
            }

            footer a{
                color: greenyellow;
                text-decoration: none;
            }

            footer a:hover{
                color: red;
                text-decoration: underline;
            }

            button {
                border: 1px solid white;
            }

            .navbar-nav .active{
                font-weight: bold;
                text-decoration: underline white;
            }

            .navbar-nav .active:hover{
                font-weight: bold;
                text-decoration: underline black;
            }

            .icons a{
                color: white !important;
                font-size: 20px;
            }

            .icons .fab:hover{
                color: red;
                transition: transform .4s;
                transform: scale(1.5);
            }
        }

        @media(max-width: 1079px){

            footer > .about{
                text-align: center;
            }

            button {
                color: white;
            }

            .navbar-dark .navbar-toggler-icon{
                color: white;
            }
        }
    </style>

    @yield('style')
</head>
<body>

    <!-- ----------------------------------- NAVBAR ----------------------------------- -->

    <nav class="navbar navbar-expand-md shadow-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-dark navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link {{ Request::is('home') ? "active" :"" }}" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('allMovies') ? "active" :"" }}" href="/allMovies">Movies</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('aboutUs') ? "active" :"" }}" href="/aboutUs">About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('contactUs') ? "active" :"" }}" href="/{{ Auth::user()->id }}/contactUs">Contact Us</a></li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle {{ Request::is('/profile') ? "active" :"" }}" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/{{ Auth::user()->id }}/profile">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div id="child_content">
        @yield('content')
    </div>


    <footer>

        <div class="row">
            <div class="col-lg-6 offset-lg-1 col-12">
                <span>Copyrigths <i class="far fa-copyright"></i> 2023-- <a href="{{ url('/') }}">Cineplex.com</a> --- All Rights Reserved.</span>
            </div>

            <div class="col-lg-2 offset-lg-2 col-4 offset-4 about">
                <a href="/home">FAQs</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 offset-lg-9 col-4 offset-4 about">
                <a href="/contactUs">Contact Us</a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-2 offset-lg-9 col-4 offset-4 about">
                <strong>Social Media</strong>

            </div>

            <div class="col-lg-2 offset-lg-9 col-4 offset-4 about icons">
                <a href="https://github.com/Harrisbaig7"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/harris-baig-3a890a203/"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.facebook.com/harrisbaig.akbarbaig/"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/_harrisbaig/"><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>

    </footer>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<!-- Scripts -->
<script src="{{ asset('frontend/bootstrap.bundle.min.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous">
</script>
@yield('scripts')

</body>

</html>
