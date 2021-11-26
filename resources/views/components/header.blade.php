<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style1.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/navstyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/sliderstyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/testimonialstyle.css') }}" type="text/css">


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <section class="nav-bar fixed-top">
        <div class="nav-container">
            <a href="{{ URL::to('home') }}">
                <p class="brandd"> Rental System </p>
            </a>

            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="{{ URL::to('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('contact') }}">Contact</a>
                    </li>

                    @if (session()->has('customer_id'))
                        <li>
                            <a href="{{ URL::to('customer_profile_Page') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('customer_bookings') }}">Bookings</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('logout') }}">Logout</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('shopping_cart') }}">
                                <svg width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                                Cart

                            </a>
                        </li>

                    @elseif (session()->has('shop_id'))

                        <li>
                            <a href="{{ URL::to('shophome') }}">My Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('logout') }}">Logout</a>
                        </li>

                    @else

                        <li>
                            <a href="#">Log In</a>
                            <ul class="nav-dropdown">
                                <li>
                                    <a href="{{ URL::to('loginascustomer') }}">as a Customer</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('loginasowner') }}">as a Owner</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Register</a>
                            <ul class="nav-dropdown">
                                <li>
                                    <a href="{{ URL::to('signupasuser') }}">as a Customer</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('signupasowner') }}">as a Owner</a>
                                </li>

                            </ul>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </section>
