<x-adminheader title="Sub Categories" />
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sub Categories</h3>
            </div>

        </div>
        <br><br><br>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                            Add New Sub Category
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Add New Subcategory</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ URL::to('add_subcategory') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label style="color:black">Select Category</label>
                                                <select name="category" id=""
                                                    class="form-control text-capitalize border-dark">
                                                    <option value="" selected>Select:</option>
                                                    @foreach ($allCategories as $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('category')
                                                        {{ $message }}
                                                    @enderror</span>

                                            </div>
                                            <div class="form-group">
                                                <label style="color:black">Enter Sub Category name</label>
                                                <input type="text" name="subcategory" class="form-control border-dark">
                                                <span class="text-danger">@error('subcategory')
                                                        {{ $message }}
                                                    @enderror</span>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add SubCategory</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr style="color:black">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($allSubcategories as $value)
                                    <tr style="color:black">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $value->subcatname }}</td>
                                        <td class="text-capitalize">{{ $value->catname }}</td>
                                        
                                        <td><a href="{{ URL::to('/admin_subcategory_shop/' . $value->subcatid) }}"
                                                class="btn btn-danger">Delete</a></td>
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
