@extends('layout.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/Story/story.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
@endsection

@section('content')
    <main>
        <div class="container mt-5 mb-5">
            <div class="title">
                <h2 class="fw-bold">Create New Product</h2>
                <hr class="mb-5">
            </div>

            {{-- <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"> --}}
            <form action=" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Cover --}}
                <div class="mb-3">
                    <label for="productCover" class="fw-semibold form-label">Product Cover</label>
                    <img class="d-block mb-3" src="{{ asset('images/product/'. $products->cover) }}" alt="Cover" id="productImagePreview" width="100%">
                    <input class="form-control" type="file" id="productCover" name="cover"
                        accept="image/png, image/jpg, image/jpeg" onchange="loadImage(event)">
                </div>

                {{-- title --}}
                <div class="mb-3 row">
                    <label for="productTitle" class="fw-semibold col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="productTitle" name="title"
                            placeholder="Product Title" value="{{ $products->title }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="productCategory" class="fw-semibold col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="product_category_id" id="productCategory">
                            @foreach ($productCategories as $productCategory)
                                <option value="{{ $productCategory->id }}" {{ $productCategory->name == $products->product_category->name ? 'selected' : '' }}>{{ $productCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- description --}}
                <div class="mb-3 row">
                    <label for="productDescription" class="fw-semibold col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" placeholder="Product Description" id="productDescription" name="description" rows="3"></textarea value="{{ $products->description }}">
                    </div>
                </div>

                {{-- stock --}}
                <div class="mb-3 row">
                    <label for="productStock" class="fw-semibold col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control ms-2" id="productStock" name="stock"
                            placeholder="Product Stock" value="{{ $products->stock }}">
                    </div>
                </div>
                
                {{-- price --}}
                <div class="mb-3 row">
                    <label for="productPrice" class="fw-semibold col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <span class="input-group-text">Rp
                        <input type="number" class="form-control ms-2" id="productPrice" name="price"
                            placeholder="Product Price" value="{{ $products->price }}">
                        </span>
                    </div>1
                </div>

                <?php $dummyVarError = ['cover', 'title', 'description', 'stock', 'price']; ?>
                @foreach ($dummyVarError as $error)
                    @error($error)
                        <div class="text-danger mb-3 bg-danger-subtle p-3 text-center fw-semibold">
                        {{ $message }}
                    </div>
                @enderror
            @endforeach

            {{-- submit button --}}
            <div class="mb-5">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</main>
@endsection

@section('script')
    {{-- manual Js --}}
                            <script src="{{ asset('js/product/product.js') }}"></script>
@endsection