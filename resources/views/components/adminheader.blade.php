<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>{{ $title }}</title> --}}

    <!-- Bootstrap -->
    <link href="{{URL::asset('adminpanel/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('adminpanel/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{URL::asset('adminpanel/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ URL::to('admin_dashboard') }}" class="site_title"><i class="fa fa-shopping-cart"></i> <span>Rental System</span></a>
            </div>

            <div class="clearfix"></div>
             <br><br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                      <li><a href="{{ URL::to('admin_dashboard') }}">Dashboard</a></li>
                      <li><a href="{{ URL::to('categories_table') }}">Category</a></li>
                      <li><a href="{{ URL::to('sub_categories_table') }}">Sub Category</a></li>
                      <li><a href="{{ URL::to('products_table') }}">Products</a></li>
                      <li><a href="{{ URL::to('withdraw_table') }}">WithDraw</a></li>
                      <li><a href="{{ URL::to('customers_table') }}">Customers</a></li>
                      <li><a href="{{ URL::to('adminlogout') }}">Log Out</a></li>
                   
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu" style="padding-bottom:10px">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            </nav>
          </div>
        </div>
