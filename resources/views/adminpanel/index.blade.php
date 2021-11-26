<x-adminheader title="Dashboard" />
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>
        </div>
        <br><br><br>


        <a href="{{ URL::to('admin_view_pending_requests') }}" class="btn btn-primary">Pending
            Requests
            <span class="badge badge-danger">{{ $CountPendingRequests }}</span></a>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="color:black">
                        <th>#</th>
                        <th>Shopkeeper Name</th>
                        <th>Phone No</th>
                        <th>CNIC</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Shop Name</th>
                        <th>Shop Address</th>
                        <th>Delete</th>
                        <th>Block/UnBlock</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($allShops as $value)
                        <tr style="color:black">
                            <th scope="row">{{ $i }}</th>
                            <td class="text-capitalize">{{ $value->fname . '' . $value->lname }}</td>
                            <td>{{ $value->phoneno }}</td>
                            <td>{{ $value->cnic }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->password }}</td>
                            <td class="text-capitalize">{{ $value->shopname }}</td>
                            <td>{{ $value->shopaddress }}</td>
                            <td><a href="{{ URL::asset('/admin_delete_shop/' . $value->id) }}"
                                    class="btn btn-danger">Delete</a></td>
                            @if ($value->status == 1)
                                <td><a href="{{ URL::to('admin_unblock_shop/' . $value->id) }}"
                                        class="btn btn-primary">UnBlock</a></td>
                            @else
                                <td><a href="{{ URL::to('admin_block_shop/' . $value->id) }}"
                                        class="btn btn-primary">Block</a></td>
                            @endif


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
