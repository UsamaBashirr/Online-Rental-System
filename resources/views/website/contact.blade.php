<x-header title="Contact Us" />
<br><br><br>


<div class="container-contact100 mt-2">

    <div class="wrap-contact100 shadow-lg">
        <div class="contact100-form-title"
            style="background-image: url({{ URL::asset('/img/contactbg/bg-01.jpg') }});">
            <span class="contact100-form-title-1">
                Contact Us
            </span>

            <span class="contact100-form-title-2">
                Feel free to drop us a line below!
            </span>

        </div>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{URL::to('sendcontactmail')}}" method="POST" class="contact100-form" >
            @csrf
            <div class="wrap-input100">
                <span class="label-input100">Full Name:</span>
                <input class="input100" type="text" name="name" placeholder="Enter full name" required>
                <span class="text-danger">@error('name')
                {{ $message }}
                @enderror</span>
            </div>

            <div class="wrap-input100">
                <span class="label-input100">Email:</span>
                <input class="input100" type="text" name="email" placeholder="Enter email addess" required>
                <span class="text-danger">@error('email')
                {{ $message }}
                @enderror</span>
            </div>

            <div class="wrap-input100">
                <span class="label-input100">Subject:</span>
                <input class="input100" type="text" name="subject" placeholder="Enter Subject of Email" required>
                <span class="text-danger">@error('subject')
                {{ $message }}
                @enderror</span>
            </div>

            <div class="wrap-input100">
                <span class="label-input100">Message:</span>
                <textarea class="input100" name="message" placeholder="Your Comment..."></textarea>
                <span class="text-danger">@error('message')
                {{ $message }}
                @enderror</span>
            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>


<x-footer />
