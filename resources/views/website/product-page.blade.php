<x-header title="Product Page" />


<!-- Page Add Section Begin -->
<br><br><br>
<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-breadcrumb">
                    <h2>{{ $pro->name }}<span>.</span></h2>

                    <a href="{{ URL::to('/') }}">Home</a>
                    <a href="">{{ $cat->name }}</a>
                    <a class="active" href="{{ URL::to('product_page/' . $pro['id']) }}">{{ $pro->name }}</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Product Page Section Beign -->
<section class="product-page">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="product-slider owl-carousel">
                    <div class="product-img">
                        <figure>
                            <img src="{{ URL::asset('img/product/' . $pro['img1']) }}" alt="Image1">

                        </figure>

                    </div>
                    <div class="product-img">
                        <figure>
                            <img src="{{ URL::asset('img/product/' . $pro['img2']) }}" alt="Image2">

                        </figure>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="product-content">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <h2>{{ $pro->name }}</h2>
                    <div class="pc-meta">
                        <h5>Rs. {{ $pro->price }} /day</h5>

                    </div>
                    <p>{{ $pro->details }}</p>
                    <ul class="tags">
                        <li><span>Category :</span> {{ $cat->name }}</li>
                        <li><span>Shop Name :</span> {{ $shop->shopname }}</li>
                    </ul>
                    <form action="{{ URL::to('addToCart') }}" method="post">
                        @csrf
                        <input type="hidden" name="proid" value="{{ $pro->id }}">
                        <input type="hidden" name="path" value="{{ Request::path() }}">
                        <input type="hidden" name="price" value="{{ $pro->price }}">
                        
                        <label for="start" class="font-weight-bold">Start:</label>
                        <input type="date" name="startdate">
                        <span class="text-danger">@error('startdate')
                        {{ $message }}
                        @enderror</span>
                        <br>
                        <label for="last" class="font-weight-bold">Last : </label>
                        <input type="date" name="enddate">
                        <span class="text-danger">@error('enddate')
                        {{ $message }}
                        @enderror</span>
                        <br>
                        <div class="product-quantity mt-2">
                            <div class="pro-qty">
                                <input type="text" value="1" name="quantity">
                                <span class="text-danger">@error('quantity')
                                {{ $message }}
                                @enderror</span>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add To Cart">
                    </form>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<!-- Product Page Section End -->

<!-- Related Product Section Begin -->
<section class="related-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($RelatedProducts as $value)
                @if ($value['id'] != $pro->id)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product-item img-thumbnail">
                            <figure>
                                <a href="{{ URL::to('product_page/' . $value['id']) }}"><img
                                        src="{{ URL::asset('img/product/' . $value['img1']) }}" alt=""></a>
                                
                            </figure>
                            <div class="product-text">
                                <h6>{{ $value['name'] }}</h6>
                                <p>{{ $value['price'] }}</p>
                                <a href="{{ URL::to('product_page/' . $value['id']) }}"><button
                                        class="btn btn-outline-primary mt-2 mb-3">View Product</button></a>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</section>
<!-- Related Product Section End -->

<!-- Footer Section Begin -->
<x-footer />
