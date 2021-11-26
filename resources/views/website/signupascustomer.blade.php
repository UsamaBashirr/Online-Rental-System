<x-header title="Sign Up" />


<br><br><br>
<div class="container rounded shadow-lg px-4 py-5 bg-white" style="margin-top:3%; max-width: 420px">
    <h3 class="text-center mb-4">SignUp as a Customer</h3>

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

    <form action="{{ URL::to('signupuser') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter the First Name" id="fname" required />

            <span class="text-danger">@error('fname')
                    {{ $message }}
                @enderror</span>
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter the Last Name" id="lname" required />

            <span class="text-danger">@error('lname')
                    {{ $message }}
                @enderror</span>
        </div>


        <div class="form-group">
            <label for="phoneno">Phone Number</label>
            <input type="tel" class="form-control" name="phoneno"
            placeholder="Enter Your 11-Digit Phone Number" pattern="[0-9]{11}" required>
            

            <span class="text-danger">@error('phoneno')
                    {{ $message }}
                @enderror</span>
        </div>


        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter the Address" id="address" />

            <span class="text-danger">@error('address')
                    {{ $message }}
                @enderror</span>
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter the Email" id="email"
                aria-describedby="emailHelp" />

            <span class="text-danger">@error('email')
                    {{ $message }}
                @enderror</span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter the Passwsord"
                id="password" />
            <span class="text-danger">@error('password')
                    {{ $message }}
                @enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary w-75 btn-block mx-auto">
            Sign Up
        </button>
        

        <p class="text-center mt-3"> Already have an account? <a href="{{ URL::to('loginascustomer') }}"> Sign-In  </a></p>

    </form>
</div>

<br><br><br>

<x-footer />
