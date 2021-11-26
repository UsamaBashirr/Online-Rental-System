<x-ownerheader title="Shop Main" sectitle="Dashboard" thirdtitle="" />

<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="text-center mb-5">Welcome {{ $shop->fname . ' ' . $shop->lname }}</h2>
            
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            {{-- Show Product --}}
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Price/ day</th>
                        <th>Details</th>
                        <th>Quantity</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Delete</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($products as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->details }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td><img src="{{ URL::asset('img/product/' . $value->img1) }}" alt=""></td>
                            <td><img src="{{ URL::asset('img/product/' . $value->img2) }}" alt=""></td>
                            <td><a href="{{ URL::to('shop_delete_product/' . $value->id) }}"
                                    class="btn btn-danger">Delete</a></td>
                            <td><a href="{{ URL::to('shop_edit_product/' . $value->id) }}"
                                    class="btn btn-primary">Edit</a></td>

                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
<br><br><br><br><br>






<x-ownerfooter />
