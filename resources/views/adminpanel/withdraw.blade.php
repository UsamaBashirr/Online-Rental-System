<x-adminheader title="Withdraw" />

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Withdraw</h3>
            </div>
        </div>
        <br><br><br>


        <a href="{{ URL::to('pending_withdraw_table') }}" class="btn btn-primary">Pending Withdraw
            Requests
            <span class="badge badge-danger">{{ $PendingWithdrawCount }}</span></a>
        <br><br>
        <div class="table-responsive">
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

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($CompletedWithdraw as $value)
                        <tr  style="color:black">
                            <td>{{ $i }}</td>
                            <td>{{ $value->shopname }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->withdrawto }}</td>
                            <td>{{ $value->phonenumber }}</td>
                            <td>{{ $value->withdrawamount }}</td>
                            <td>{{ $value->AmountStatus }}</td>

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
