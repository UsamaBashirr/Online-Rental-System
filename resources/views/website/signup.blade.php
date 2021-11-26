<x-header title="Shopping Cart" />


    <div class="container">

        <div class="row mt-3">
            <div class="col-12">
            <script>
                    function randomChange() {
                        var a = document.getElementById('type').value;
                        if(a=="customer")
                        {
                            var arr = ['<div class="row">'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="font-weight-bold">First Name</label>'+
                                        '<input type="text" name="fname" id="fname" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                ' <div class="form-group">'+
                                        '<label for="" class="font-weight-bold">Last Name</label>'+
                                        '<input type="text" name="lname" id="lname" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="font-weight-bold">Phone No</label>'+
                                        '<input type="text" name="phoneno" id="phoneno" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="font-weight-bold">Address</label>'+
                                        '<input type="text" name="address" id="Address" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="font-weight-bold">Email</label>'+
                                        '<input type="email" name="email" id="email" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-6 col-md-6 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="font-weight-bold">Password</label>'+
                                        '<input type="password" name="password" id="password" class="form-control">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<input type="submit" class="btn btn-primary btn-block" value="Signup">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'];
                        }else
                        if (a == "shopKeeper") {
                            var arr = ['<div class="row">'+
                               ' <div class="col-lg-6 col-md-12 col-sm-12">'+
                                    '<div class="form-group">'+
                                        '<h2>Personal Details</h2>'+
                                        '<span>_________________</span>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">First Name</label>'+
                                        '<input type="hidden" name="usertype" value="shopkeeper">'+
                                        '<input type="text" name="fname" class="form-control">'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">Last Name</label>'+
                                        '<input type="text" name="lname" class="form-control">'+
                                   '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">Phone No</label>'+
                                        '<input type="text" name="phoneno" class="form-control">'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">CNIC</label>'+
                                        '<input type="text" name="cnic" class="form-control">'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">Email</label>'+
                                        '<input type="email" name="email" class="form-control">'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="">Password</label>'+
                                        '<input type="password" name="password" class="form-control">'+
                                    '</div>'+
                            '</div>'+
                            '<div class="col-lg-6 col-md-12 col-sm-12">'+
                                '<div class="form-group">'+
                                    '<h2>Shop Details</h2>'+
                                    '<span>_________________</span>'+
                               '</div>'+
                                '<div class="form-group">'+
                                    '<label for="">Shop Name</label>'+
                                    '<input type="text" name="shopname" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="">Shop Address</label>'+
                                    '<input type="text" name="shopaddress" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="">Shop Offical Number</label>'+
                                    '<input type="text" name="shopofficialnumber" class="form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="">Shop Certificate</label>'+
                                    '<input type="file" name="shopcertificate" class="form-control">'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12">'+
                                    '<input type="submit" class="btn btn-primary btn-block" value="Signup">'+
                                '</div>'+
                            '</div>'
                            ];
                            document.getElementById("appenditems").style.display = "block";
                        }else if (a == "") {
                            document.getElementById("appenditems").style.display = "none";
                            arr=[''];
                        }
                        var string = "";
                        for (i = 0; i < arr.length; i++) {
                            string += arr[i];
                        }

                        document.getElementById("appenditems").innerHTML = string;
                    }
                </script>
                <form action="{{ URL::to('signupuser') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12">
                            @if(session()->has('failure'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('failure') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            <h1 class="text-center mt-5">Signup</h1>
                            <select name="type" id="type" class="form-control mt-3" onchange="randomChange()">
                                <option value="">Select:</option>
                                <option value="customer">Customer</option>
                                <option value="shopKeeper">ShopKeeper</option>
                            </select>
                        </div>
                    </div>
                    <div id="appenditems"></div>
                    
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <x-footer />
