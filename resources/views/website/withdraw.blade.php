<x-ownerheader title="Withdraw" sectitle="Withdraw" thirdtitle=" / Withdraw" />

<div class="container mt-5">


    <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
            <!-- Withdraw Money Form
        ============================================= -->
            <div class="bg-white shadow-lg rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">
                <div class="text-center bg-primary p-4 rounded mb-4">
                    @php
                        $TotalPrice = 0;
                        $TotalWithdrawPrice = 50 * $withdrawCount;
                    @endphp
                    @foreach ($totalamount as $item)

                        @php
                            $TotalPrice += $item->price;
                        @endphp

                    @endforeach

                    @foreach ($withdrawdata as $item)
                        @php
                            $TotalWithdrawPrice += $item->withdrawamount;
                        @endphp
                    @endforeach
                    
                    <h3 class="text-10 text-white font-weight-400">Rs. {{ $TotalPrice - $TotalWithdrawPrice }}</h3>

                    <p class="text-white">Available Balance</p>
                </div>

                @if (session()->has('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('failure'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('failure') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form id="form-send-money" action="/withdrawamount" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="totalprice" value="{{ $TotalPrice }}">

                        <label for="withdrawto">Withdraw to</label>
                        <select id="withdrawto" name="withdraw" class="custom-select" required>
                            <option value="">Select : </option>
                            <option value="JazzCash">JazzCash</option>
                            <option value="EasyPaisa">EasyPaisa</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="phoneno">Phone Number</label>
                        <input type="tel" class="form-control" name="phonenumber"
                            placeholder="Enter Your 11-Digit Phone Number" pattern="[0-9]{11}" required>


                    </div>
                    <div class="form-group">
                        <label for="youSend">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text">Rs. </span> </div>
                            <input type="number" class="form-control" name="amount"
                                placeholder="Enter Your Amount to Withdraw" min="0" required>
                        </div>
                    </div>
                    <p class="text-muted mt-4">Transactions fee <span
                            class="float-right d-flex align-items-center">50.00 Pkr</span></p>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block">Withdraw</button>
                </form>

            </div>
            <!-- Withdraw Money Form end -->
        </div>
    </div>




</div>
<br><br><br><br><br>






<x-ownerfooter />
