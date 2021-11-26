<x-header title="Customer Profile" />
<div class="container" style="margin-top:100px;margin-bottom:100px">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-6 col-sm-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h2 class="text-center mb-5">Update Profile</h2>
            <form action="{{ URL::to('/update_customer_profile') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ $customer->fname }}">
                            
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ $customer->lname }}">
                            
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Phone no</label>
                            <input type="tel" class="form-control" name="phoneno"
                                placeholder="Enter Your 11-Digit Phone Number" pattern="[0-9]{11}"
                                value="{{ $customer->phoneno }}" required>
                            
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                            
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" value="{{ $customer->password }}">
                            
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="Update_Profile" class="btn btn-primary btn-block"
                                value="Update Profile">

                        </div>

                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
<x-footer />
