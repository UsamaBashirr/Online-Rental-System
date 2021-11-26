<x-header title="Home" />




<!-- Hero Slider Begin -->
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
        <li data-target="#carouselIndicators" data-slide-to="3"></li>

    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active"
            style="background-image: url('{{ URL::asset('/img/slider/furniture.jpg') }}')">
            <div class="carousel-caption d-md-block">
                <h2 class="display-4 text-light font-weight-bold">Furniture</h2>
                <p class="lead text-light">This is a description for the furniture slide.</p>
            </div>
        </div>


        <div class="carousel-item" style="background-image: url('{{ URL::asset('/img/slider/electronics.jpg') }}')">
            <div class="carousel-caption  d-md-block">
                <h2 class="display-4 text-light font-weight-bold">Electronics</h2>
                <p class="lead text-light">This is a description for the Electronics slide.</p>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('{{ URL::asset('/img/slider/automobile.jpg') }}')">
            <div class="carousel-caption  d-md-block">
                <h2 class="display-4 text-light font-weight-bold">Automobile</h2>
                <p class="lead text-light">This is a description for the Automobile slide.</p>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url('{{ URL::asset('/img/slider/rooms.jpg') }}')">
            <div class="carousel-caption  d-md-block">
                <h2 class="display-4 text-light font-weight-bold">Room</h2>
                <p class="lead text-light">This is a description for the Rooms slide.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Hero Slider End -->

<br><br><br><br><br>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="four col-md-4">
            <div class="counter-box colored"> <i class="fa fa-thumbs-o-up"></i> <span class="counter">{{ $customerCount }}</span>
                <p>Happy Customers</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-group"></i> <span class="counter">{{ $shopCount }}</span>
                <p>Registered Members</p>
            </div>
        </div>
        <div class="four col-md-4">
            <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">{{ $productCount }}</span>
                <p>Available Products</p>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>



<!-- Latest Product Begin -->

<section class="latest-products">
    <div class="container">
        <div class="product-filter">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Latest Products</h2>
                    </div>
                    <ul class="product-controls">
                        <li data-filter="*">All</li>
                        @foreach ($c as $value)
                            <li data-filter=".{{ $value['name'] }}">{{ $value['name'] }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        {{-- Search Box --}}
        <form action="/search" method="post">
            @csrf
            <div class="input-group w-50 mx-auto mb-5">
                <input type="search" class="form-control rounded" name="search" placeholder="Search" />
                <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
            </div>
        </form>



        <div class="row" id="product-listt">
            @foreach ($c as $value)
                @foreach ($subcat as $value1)
                    @if ($value1['catid'] == $value['id'])
                        @foreach ($product as $value2)
                            @if ($value2['subcatid'] == $value1['id'])
                                <div class="col-lg-3 col-sm-6 mix all {{ $value['name'] }}">
                                    <div class="single-product-item img-thumbnail">
                                        <figure>
                                            <a href="{{ URL::to('product_page/' . $value2['id']) }}"><img
                                                    src="{{ URL::asset('img/product/' . $value2['img1']) }}"
                                                    alt=""></a>

                                        </figure>
                                        <div class="product-text">
                                            <h6>{{ $value2['name'] }}</h6>
                                            <p>RS. {{ $value2['price'] }} /day</p>
                                            <a href="{{ URL::to('product_page/' . $value2['id']) }}"><button
                                                    class="btn btn-outline-primary mt-2 mb-3">View Product</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Latest Product End -->


<!-- Testimonials-->

<section class="bg-light">
<br>
<h2 class="mb-5 text-center">What people are saying...</h2>

<div class="containerr">

    <div class="box">
        <div class="image">
            <img src="{{ URL::asset('/img/testimonial/testimonial1.jpeg') }}">
        </div>
        <div class="name_job">David Chrish</div>
        <p> Lorem ipsum dolor sitamet, stphen hawkin so adipisicing elit. Ratione disuja doloremque reiciendi nemo.</p>
    </div>
    <div class="box">
        <div class="image">
            <img src="{{ URL::asset('/img/testimonial/testimonial2.jpeg') }}" alt="">
        </div>
        <div class="name_job">Kristina Bellis</div>
        <p> Lorem ipsum dolor sitamet, stphen hawkin so adipisicing elit. Ratione disuja doloremque reiciendi nemo.</p>
    </div>
    <div class="box">
        <div class="image">
            <img src="{{ URL::asset('/img/testimonial/testimonial3.jpeg') }}" alt="">
        </div>
        <div class="name_job">Stephen Marlo</div>
        <p> Lorem ipsum dolor sitamet, stphen hawkin so adipisicing elit. Ratione disuja doloremque reiciendi nemo.</p>
    </div>
</div>
<br>
</section>



<!-- Footer Section Begin -->
<x-footer />
