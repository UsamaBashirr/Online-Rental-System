<x-ownerheader title="Edit Product" sectitle="Edit Product" thirdtitle="/ Edit Product" />

<div class="container">

    <h2 class="text-center mb-2">Edit Product </h2>

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

    <form action="{{ URL::to('update_shop_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            <span class="text-danger">@error('name')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Price per Day</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            <span class="text-danger">@error('price')
                    {{ $message }}
                @enderror</span>

        </div>
        <div class="form-group">
            <label for="">Details</label>
            <textarea name="details" id="details" class="form-control" cols="30" rows="10" required>
                {{ $product->details }}
        </textarea>
            <span class="text-danger">@error('details')
                    {{ $message }}
                @enderror</span>

        </div>

        <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
            <span class="text-danger">@error('quantity')
                    {{ $message }}
                @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Image 1</label>
            <input type="file" name="image1" class="form-control" value="{{ $product->img1 }}" required>
            <span class="text-danger">@error('image1')
                    {{ $message }}
                @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Image 2</label>
            <input type="file" name="image2" class="form-control" required>

            <span class="text-danger">@error('image2')
                    {{ $message }}
                @enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Update Product</button>


        <br><br><br>
    </form>
</div>




<x-ownerfooter />
