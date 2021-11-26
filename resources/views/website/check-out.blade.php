<x-header title="CheckOut" />



<br><br><br><br><br>
<!-- Page Add Section Begin -->
<section class="page-add mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Checkout<span>.</span></h2>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="img/add.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Cart Total Page Begin -->
<section class="cart-total-page spad">
    <div class="container">
        <form action="{{ URL::to('docheckout') }}" class="checkout-form" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h3>Your Information</h3>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Name*</p>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" placeholder="First Name" value="{{ $customer->fname }}">
                        </div>
                        <div class="col-lg-5">
                            <input type="text" placeholder="Last Name" value="{{ $customer->lname }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Street Address*</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $customer->address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">City</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $customer->address }}">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Phone*</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $customer->phoneno }}">
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="order-table">
                        @php
                            $TotalPrice = 200;
                        @endphp
                        @foreach ($cartData as $value)
                            @php
                                $TotalPrice += $value->price * $value->quantity * $value->days;
                            @endphp
                            <div class="cart-item">
                                <span>{{ $value->name }} x {{ $value->quantity }} ({{ $value->days }} days)</span>
                                <p class="product-name">{{ $value->price * $value->quantity * $value->days }}</p>
                            </div>
                        @endforeach
                        <div class="cart-item">
                            <span>Delivery Cost</span>
                            <p class="product-name">200</p>

                        </div>

                        <div class="cart-total">
                            <span>Total</span>
                            <p>Rs. {{ $TotalPrice }}</p>
                            <input type="hidden" name="totalprice" value="{{$TotalPrice}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-method">

                        <button type="submit">Place your order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Cart Total Page End -->

<!-- Footer Section Begin -->
<x-footer />
