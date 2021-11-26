<x-header title="Search" />


<div  class="container" style="margin-top: 8%;">

    <h2 class="text-center">Searched Products</h2>
<br><br>
        {{-- Search Box --}}
        <form action="/search" method="post">
            @csrf
            <div class="input-group w-50 mx-auto mb-5">
                <input type="search" class="form-control rounded" name="search" placeholder="Search" value="{{$requestproduct}}" />
                <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
            </div>
        </form>
        @foreach ($product as $value)

            <div class="card mb-5">
                <div class="row p-3">
                    <div class="col-lg-4 col-md-4">
                        <a href="{{ URL::to('product_page/' . $value['id']) }}">
                        <img class="img-thumbnail" src="{{ URL::asset('img/product/' . $value['img1']) }}" ></a>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="card-block mt-2">
                            <h4 class="card-title">{{ $value['name'] }}</h4>
                           <p class="mt-2">Rs. {{ $value['price'] }}</p>
                        <p class="card-text mt-2 mb-3">{{ $value['details'] }} </p>
                        
                            <a href="{{ URL::to('product_page/' . $value['id']) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

    </div>
</div>

<x-footer />
