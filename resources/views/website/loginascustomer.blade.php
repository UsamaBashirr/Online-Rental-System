<x-header title="Login" />

<br><br><br>
<div class="container rounded shadow-lg px-4 py-5 bg-white" style="margin-top:10%; max-width: 420px">
    <h3 class="text-center mb-5">Login as a Customer</h3>

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

    <form action="{{ URL::to('loginuser') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter the Email" id="email"
                aria-describedby="emailHelp" required />

            <span class="text-danger">@error('email')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter the Passwsord"
                id="password" required/>
            <span class="text-danger">@error('password')
                    {{ $message }}
                @enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary w-75 btn-block mx-auto">
            Log in
        </button>

        <p class="text-center mt-3"> New Customer? <a href="{{ URL::to('signupasuser') }}"> Start here  </a></p>
    </form>
</div>

<br><br><br>



<x-footer />
