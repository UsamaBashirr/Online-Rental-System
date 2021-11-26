<x-ownerheader title="Add Product" sectitle="Add Product" thirdtitle="/ Add Product" />

<div class="container">

    <h2 class="text-center mb-2">Add Product </h2>

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

    <form action="{{ URL::to('add_shop_product') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
            <span class="text-danger">@error('name')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Price per Day</label>
            <input type="text" name="price" class="form-control">
            <span class="text-danger">@error('price')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Details</label>
            <textarea name="details" id="details" class="form-control" cols="30" rows="10">
        </textarea>
            <span class="text-danger">@error('details')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Select Category</label>
            <select name="category" id="category" class="form-control" onchange="">
                <option value="">Select:</option>
                @foreach ($allCategories as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('category')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Select Sub Category
            </label>
            <select name="subcat" id="subcategory" class="form-control">
                <option selectd value="">Select:</option>

                @foreach ($subcategories as $subcat)
                    <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                @endforeach

            </select>
            <span class="text-danger">@error('subcat')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Quantity</label>
            <input type="text" name="quantity" class="form-control">
            <span class="text-danger">@error('quantity')
                    {{ $message }}
                @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Image 1</label>
            <input type="file" name="image1" accept="image/png, .jpeg, .jpg" class="form-control">
            <span class="text-danger">@error('image1')
                    {{ $message }}
                @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Image 2</label>
            <input type="file" name="image2" accept="image/png, .jpeg, .jpg" class="form-control">
            <span class="text-danger">@error('image2')
                    {{ $message }}
                @enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Add Product</button>


        <br><br><br>
    </form>
</div>




<x-ownerfooter />
