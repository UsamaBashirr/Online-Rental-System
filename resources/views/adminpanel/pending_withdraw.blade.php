<x-adminheader title="Pending Withdraw" />



<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pending Withdraw <small></h3>
            </div>

        </div>

        <br><br><br>

        <a href="{{ URL::to('withdraw_table') }}" class="btn btn-primary">Completed Withdraw
            Requests
            <span class="badge badge-danger">{{ $CompletedWithdrawCount }}</span></a>
        <br><br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <br><br>
                    <div class="x_content">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr style="color:black">
                                    <th>#No</th>
                                    <th>ShopName</th>
                                    <th>ShopEmail</th>
                                    <th>WithDrawTo</th>
                                    <th>Phone Number</th>
                                    <th>Withdraw Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($PendingWithdraw as $value)
                                    <tr  style="color:black">
                                        <td>{{ $i }}</td>
                                        <td>{{ $value->shopname }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->withdrawto }}</td>
                                        <td>{{ $value->phonenumber }}</td>
                                        <td>{{ $value->withdrawamount }}</td>
                                        <td>{{ $value->AmountStatus }}</td>
                                        <td><a href="{{ URL::to('confirm_withdraw/' . $value->id . '/' . $value->email) }}"
                                                class="btn btn-primary">Confirm</a>
                                            <a href="{{ URL::to('cancel_withdraw/' . $value->id . '/' . $value->email) }}"
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
    <!-- /page content -->

    <x-adminfooter />
