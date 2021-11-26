<x-adminheader title="Categories" />
<!-- page content -->
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Categories</h3>
            </div>
        </div>
        <br><br><br>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                            Add New Category
                        </button>

                        <br>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Add Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ URL::to('add_category') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Enter New Category</label>
                                                <input type="text" name="category" class="form-control" required>
                                                <span class="text-danger">@error('category')
                                                        {{ $message }}
                                                    @enderror</span>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add Category</button>
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
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($allCategories as $value)
                                    <tr style="color:black">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $value['name'] }}</td>
                                        <td>

                                            <!--  Edit Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#EditModel{{ $i }}">
                                                Edit Category
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="EditModel{{ $i }}" tabindex="-1" role="dialog"
                                                aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Edit Category</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ URL::to('update_category') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Edit Category</label>
                                                                    <input type="hidden" name="id" value="{{ $value['id'] }}">
                                                                    <input type="text" name="category"
                                                                        class="form-control" value="{{ $value['name'] }}" required>
                                                                    <span class="text-danger">@error('category')
                                                                            {{ $message }}
                                                                        @enderror</span>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Category</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin_category_shop/' . $value->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
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
    <!-- /page content -->

    <x-adminfooter />
