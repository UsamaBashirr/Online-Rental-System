<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: "Roboto Condensed", sans-serif;
            background-color: #dedede;
        }

    </style>

    <title>Rental System</title>
</head>

<body>

    <br><br>
    <div class="container rounded shadow-lg px-4 py-5 mt-5 bg-white" style="max-width: 420px">
        <h1 class="text-center mb-4">Welcome</h1>
        @if (session()->has('failure'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('failure') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        @endif
        <form action="{{ URL::to('adminlogin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" />

                <span class="text-danger">@error('email')
                        {{ $message }}
                    @enderror</span>

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
                <span class="text-danger">@error('password')
                        {{ $message }}
                    @enderror</span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-75 btn-block mx-auto">
                Log in
            </button>
        </form>
    </div>

    <br><br><br>

</body>

</html>
