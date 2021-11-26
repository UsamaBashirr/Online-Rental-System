<x-header title="Bookings" />
<div class="container" style="margin-top:140px; margin-bottom:100px">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <h2 class="text-center mb-5">My Bookings</h2>
            <table class="table table-bordered table-hover mt-5">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Price/ day</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Cancel Booking</th>
                        <th>Chat</th>

                    </tr>

                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($My_Orders as $value)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->orderquantity }}</td>
                            <td>{{ $value->orderstatus }}</td>
                            <td>
                                @if ($value->orderstatus == 'pending')
                                
                                    <a href="{{ URL::to('cancel_booking/'. $value->orderid . '/' . $value->id . '/' . $value->customeremail )}}" class="btn btn-danger">Cancel Booking</a>
                                
                                @else
                                    <button type="submit" class="btn btn-primary">Delivered</button>

                                @endif
                            </td>
                            <td>
                                <a class="btn btn-outline-primary" href="//api.whatsapp.com/send?phone=0092{{ $value->phoneno }}" target="_blank">Chat</a>
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
<x-footer />
