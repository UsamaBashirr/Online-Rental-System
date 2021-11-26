<x-header title="Payment" />

<div class="container mb-5" style="margin-top: 10%">
    <div class="status">
        <?php $post_data = Session::get('post_data'); ?>

        @if ($response['pp_ResponseCode'] == '000')
            <!-- --------------------------------------------------------------------------- -->
            <!-- Payment successful -->
            <h2 class="success">Your Payment has been Successful</h2>
            <br>
            <h4>Payment Information</h4>
            <br>
            <p><b>Reference Number:</b> {{ $response['pp_RetreivalReferenceNo'] }}</p>
            <p><b>Transaction ID:</b> {{ $response['pp_TxnRefNo'] }}</p>
            <p><b>Paid Amount:</b> {{ $response['pp_Amount'] }}</p>
            <p><b>Payment Status:</b> Success</p>
            <!-- --------------------------------------------------------------------------- -->


            <!-- --------------------------------------------------------------------------- -->
            <!-- Payment not successful -->
        @elseif($response['pp_ResponseCode'] == '124')
            <h1 class="error">Your Payment has been on Waiting satate</h1>
            <p><b>Message: </b>{{ $response['pp_ResponseMessage'] }}</p>
            <p><b>Voucher Number: </b>{{ $response['pp_RetreivalReferenceNo'] }}</p>
            <!-- --------------------------------------------------------------------------- -->


            <!-- --------------------------------------------------------------------------- -->
            <!-- Payment not successful -->
        @else
            <h1 class="error">Your Payment has Failed</h1>
            <p><b>Message: </b>{{ $response['pp_ResponseMessage'] }}</p>
        @endif
        <!-- --------------------------------------------------------------------------- -->


    </div>
    <br>
    <a href="{{ URL::to('/') }}" class="btn-link">Back to Products</a>
</div>

<x-footer />
