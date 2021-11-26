<x-adminheader title="Products" />
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Products Tables <small></h3>
            </div>

        </div>
        <br><br><br>

        <div class="table-responsive bg-white">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="color:black">
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Sub Category</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Shop</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($allProducts as $value)
                        <tr style="color:black">
                            <th scope="row">{{ $i }}</th>
                            <td class="text-capitalize">{{ $value->name }}</td>
                            <td class="text-capitalize">{{ $value->price }}</td>
                            <td class="text-capitalize">{{ $value->details }}</td>
                            <td class="text-capitalize">{{ $value->subcatname }}</td>
                            <td class="text-capitalize">{{ $value->quantity }}</td>
                            <td><img src="{{ URL::asset('img/product/' . $value->img1) }}" width="150px" alt=""></td>
                            <td class="text-capitalize">{{ $value->shopid }}</td>
                            <td><a href="{{ URL::to('admin_product/' . $value->id) }}"
                                    class="btn btn-danger">Delete</a></td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <!-- /page content -->

    <x-adminfooter />
