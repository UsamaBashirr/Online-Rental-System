<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description">
    <meta name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/ownerstyle.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ URL::to('home') }}">Rental System</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="{{ URL::to('shophome') }}">
                                <div class="sb-nav-link-icon"></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{ URL::to('add_product') }}">
                                <div class="sb-nav-link-icon"></div>
                                Add Product
                            </a>

                            <a class="nav-link" href="{{ URL::to('shop_orders_page') }}">
                                <div class="sb-nav-link-icon"></div>
                                Orders
                            </a>
                            <a class="nav-link" href="{{ URL::to('withdraw') }}">
                                <div class="sb-nav-link-icon"></div>
                                Withdraw
                            </a>

                            <a class="nav-link" href="{{ URL::to('shop_profile_page') }}">
                                <div class="sb-nav-link-icon"></div>
                                Profile
                            </a>
                            <a class="nav-link" href="{{ URL::to('logout') }}">
                                <div class="sb-nav-link-icon"></div>
                                LogOut
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{ $sectitle }}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item p-3">Dashboard {{ $thirdtitle }}</li>
                        </ol>
                    </div>
                </main>

