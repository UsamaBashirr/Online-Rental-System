<x-ownerheader title="Shopkeeper Profile" sectitle="Profile" thirdtitle="/ Profile" />


<div class="container mt-5">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h2 class="text-center mb-5">Profile</h2>
            <form action="{{ URL::to('update_shop_profile') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ $shop->fname }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ $shop->lname }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Phone No</label>
                            <input type="text" name="phoneno" class="form-control" value="{{ $shop->phoneno }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">CNIC</label>
                            <input type="text" name="cnic" class="form-control" value="{{ $shop->cnic }}">
                            
                        </div>

                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" value="{{ $shop->password }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Shop Name</label>
                            <input type="text" name="shopname" class="form-control"
                                value="{{ $shop->shopname }}">
                             
                        </div>
                        <div class="form-group">
                            <label for="">Shop Address</label>
                            <input type="text" name="shopaddress" class="form-control" value="{{ $shop->shopaddress }}">
                     
                        </div>
                       

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input type="submit" name="UpdateProfile" class="btn btn-primary btn-block"
                            value="Update Profile">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<x-ownerfooter />
