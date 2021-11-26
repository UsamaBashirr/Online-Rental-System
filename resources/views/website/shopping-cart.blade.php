<x-header title="Shopping cart" />

<br><br>
<!-- Page Add Section Begin -->
<div class="container">
    <section class="page-add cart-page-add">

        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Cart</h2>
                </div>
            </div>
        </div>

    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Price/ day</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Booking</th>
                        <th scope="col">Total Price</th>
                        <th scope="col" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $TotalPrice = 0;
                    @endphp

                    @foreach ($cartData as $value)
                        @php
                            $TotalPrice += $value->quantity * $value->price * $value->days;
                        @endphp
                        <tr>
                            <td class="product-col">
                                <img src="{{ URL::asset('img/product/' . $value->img1) }}" alt="">
                                <div class="p-title">
                                    <h5>{{ $value->name }}</h5>
                                </div>
                            </td>
                            
                            <td class="price-col">Rs. {{ $value->price }}
                            
                            </td>
                            <td class="quantity-col">
                                <form action="{{ URL::to('update_cart_item') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="{{ $value->quantity }}" readonly>
                                    <span class="text-danger">@error('quantity')
                                    {{ $message }}
                                    @enderror</span>
                                    </div>
                            </td>
                            <td>
                                <input type="date" name="startdate" value="{{ $value->startdate }}">
                                <input type="date" name="enddate" value="{{ $value->enddate }}">
                                
                            </td>
                            <td class="total">{{ $value->quantity * $value->price * $value->days }}</td>
                            <td>
                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                <input type="hidden" name="price" value="{{ $value->price }}">
                            </td>
                            </form>
                            <td class="product-close">
                                <a href="{{ URL::to('delete_cart_item/' . $value->id) }}"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="shopping-method">

            <div class="row">
                <div class="col-lg-12 text-center">

                    <div class="total-info">
                        <div class="total-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th>Delivery Cost</th>
                                        <th>Checkout</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="total">{{ $TotalPrice }}</td>
                                        <td>200</td>
                                        <td><a href="{{ URL::to('checkout') }}"
                                                class="primary-btn chechout-btn">Proceed to
                                                checkout</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Cart Page Section End -->

<!-- Footer Section Begin -->
<x-footer />
