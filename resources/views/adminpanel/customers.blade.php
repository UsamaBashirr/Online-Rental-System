<x-adminheader title="Customers" />

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customers</h3>
            </div>

        </div>
        <br><br><br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">


                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr style="color:black">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone #</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($allCustomers as $value)
                                    <tr style="color:black">
                                        <th scope="row">{{ $i }}</th>
                                        <td class="text-capitalize">{{ $value->fname . '' . $value->lname }}</td>
                                        <td>{{ $value->phoneno }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->password }}</td>


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





        </div>
    </div>
    <!-- /page content -->

    <x-adminfooter />
