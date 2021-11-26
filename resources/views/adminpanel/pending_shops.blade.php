<x-adminheader title="Pending Shops" />



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pending Shops <small></h3>
              </div>

            </div>

            <br><br><br>

            <a href="{{ URL::to('pending_withdraw_table') }}" class="btn btn-primary">Accepted
              Requests
              <span class="badge badge-danger">{{ $CountAcceptedRequests }}</span></a>
              <br><br>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <br><br>
                  <div class="x_content">

                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr style="color:black">
                          <th>#</th>
                          <th>Shopkeeper Name</th>
                          <th>Phone No</th>
                          <th>CNIC</th>
                          <th>Email</th>
                          <th>Shop Name</th>
                          <th>Shop Address</th>
                          <th>Approve</th>
                          <th>Reject</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $i=1;
                      @endphp
                      @foreach( $allPendingShops as $value)
                        <tr style="color:black">
                          <th scope="row">{{ $i }}</th>
                          <td class="text-capitalize">{{ $value->fname.''.$value->lname }}</td>
                          <td>{{ $value->phoneno }}</td>
                          <td>{{ $value->cnic}}</td>
                          <td>{{ $value->email}}</td>
                          <td class="text-capitalize">{{ $value->shopname}}</td>
                          <td>{{ $value->shopaddress}}</td>
=                         
                          <td><a href="{{URL::to('admin_approve_shop/'.$value->id)}}" class="btn btn-info">Approve</a></td>
                          <td><a href="{{URL::to('admin_reject_shop/'.$value->id)}}" class="btn btn-danger">Reject</a></td>
                          
                         
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

  <x-adminfooter/>