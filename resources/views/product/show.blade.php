@extends('layout.app')

@section('title', 'Product')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product/show.css') }}">
@endsection

@section('content')
    <main>
        <div class="container bg-white p-3 py-4 px-md-5">
            <a class="col-3 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="{{ route('home.page', $product->id) }}">Back</a>
            <div
                class="d-flex justify-content-between flex-column flex-md-row
                      align-items-center py-3 border-bottom">
                <h2 class="text-center fw-bold">{{ $product->title }}</h2>
                <hr>
            </div>
            <div class="row border-bottom">
                <div>
                    <img src="{{ asset('images/product/' . $product->cover) }}" alt="cover" width="300" height="225">
                </div>
                <div>
                    <div class="my-3">
                    </div>
                    <div class="my-3">
                        <h5 class="fw-bold">Product Details : </h5>
                        <div class="row">
                            <h5 class="col-4"><span
                                    class="badge text-bg-warning">{{ $product->product_category->name }}</span> </h5>
                            <p class="col-4">Stock: {{ $product->stock }}</p>
                            <p class="text-danger col-4">Rp {{ number_format($product->price, 2) }} </p>
                        </div>
                    </div>
                    <div class="my-3">
                        <h5 class="fw-bold">Description : </h5>
                        <p class="story-synopsis fs-6">
                            {{ $product->description }}
                        </p>
                    </div>
                    @if (auth()->user()->username !== 'admin')
                        <form action="{{ route('cart', $product->id) }}">
                            @csrf
                            <div class="d-flex mb-3">
                                <label class="me-3" for="inputQuantity">Input Quantity: </label>
                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                    class="form-control form-control-sm bg-white text-center w-25" />
                            </div>
                            <div class="row">
                                <button type="submit" class="col-12 me-3 btn btn-outline-warning text-dark w-25">Add to
                                    Cart</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    @include('partial.sweet_alert')
@endsection
