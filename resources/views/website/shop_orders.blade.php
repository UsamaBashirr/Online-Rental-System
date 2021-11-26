<x-ownerheader title="Shop Main" sectitle="Orders" thirdtitle="/ Orders" />

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true" style="color:black">Completed orders <span
                                    class="badge badge-primary">{{ $CompletedOrdersCount }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false" style="color:black">Pending orders <span
                                    class="badge badge-primary">{{ $PendingOrdersCount }}</span></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        {{-- Completed --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Name</th>
                                        <th>Price/ day</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Customer Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($CompletedOrders as $value)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td><img src="{{ URL::asset('img/product/' . $value->img1) }}"
                                                    width="150px"></td>
                                            <td>{{ $value->orderquantity }}</td>
                                            <td>{{ $value->email }}</td>

                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pending --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Name</th>
                                        <th>Price/ day</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Customer Email</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($PendingOrders as $value)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td><img src="{{ URL::asset('img/product/' . $value->img1) }}"
                                                    width="150px" alt=""></td>
                                            <td>{{ $value->orderquantity }}</td>
                                            <td>{{ $value->customeremail }}</td>
                                            <td>{{ $value->rentproductstatus }}</td>
                                            <td><a href="{{ URL::to('confirm_order/' . $value->orderid . '/' . $value->customeremail) }}"
                                                    class="btn btn-primary">Confirm</a>
                                                <a href="{{ URL::to('cancel_order/' . $value->orderid . '/' . $value->customeremail) }}"
                                                    class="btn btn-danger">Cancel</a>
                                            </td>

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

            </div>

        </div>
    </div>
</div>

<x-ownerfooter />
