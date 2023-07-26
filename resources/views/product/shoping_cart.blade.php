@extends('layout.app')

@section('title', 'Shoping Cart')

@section('content')

    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <img src="{{ asset('images/icon/Location-Icon.png') }}" alt="map-icon" width="35" height="30">
                        <p class="ms-3 mt-3">Your Current Location</p>
                        <a href="#" class="btn btn-outline-warning ms-3 text-dark">Change</a>
                    </div>

                    <?php $total = 0; ?>
                    @foreach ((array) session('cart') as $id => $detail)
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('images/product/' . $detail['cover']) }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $detail['title'] }}</p>
                                        <p><span class="text-muted badge text-bg-warning">{{ $detail['category'] }}</p>
                                    </div>

                                    {{-- change quantity --}}
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        {{-- <button class="btn btn-link px-2 text-decoration-none fw-bold fs-4"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus">-</i> --}}
                                        </button>
                                        <input id="form1" min="0" name="quantity" value="{{ $detail['quantity'] }}" type="number"
                                            disabled class="form-control form-control-sm bg-white text-center" />
                                        {{-- <button class="btn btn-link px-2 text-decoration-none fw-bold fs-5"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus">+</i>     --}}
                                        </button>
                                    </div>

                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">Rp {{ number_format($detail['price'] * $detail['quantity']) }}</h5>
                                    </div>

                                    <div class="col-2">
                                        <form action="{{ route('cart.destroy', $detail['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>

                                    {{-- <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div> --}}
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body d-flex justify-content-between rounded-3">
                                <h5 class="fw-normal">Delivery</h5>
                                <select class="form-select w-25">
                                    <option selected value="1">AnterAja</option>
                                    <option value="2">JNT</option>
                                    <option value="3">SiCepat</option>
                                </select>
                            </div>
                        </div>
                        <?php $total += $detail['price'] * $detail['quantity'] ?>
                    @endforeach
{{-- 
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> --}}

                    <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                            <div class="form-outline flex-fill">
                                <label class="form-label" for="form1">Discound code</label>
                                <input type="text" id="form1" class="form-control form-control-lg"
                                    placeholder="Input discount code here ..." />
                            </div>
                            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4 p-4">
                        <h4 class="mb-3">Payment</h4>
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-semibold">Delivery Fee</h6>
                            <h6 class="fw-semibold">Rp {{ number_format(10000) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-semibold">Administration Fee</h6>
                            <h6 class="fw-semibold">Rp {{ number_format(1000) }}</h6>
                        </div>
                        <hr>
                        <div class="mt-3 mb-3 d-flex justify-content-between">
                            <h4 class="fw-bold">Total</h4>
                            <h4 class="fw-bold text-danger">Rp {{ number_format($total + 10000 + 1000) }}</h4>
                        </div>
                    </div>

                    <div class="t-3">
                        <a type="button" class="w-100 btn btn-warning btn-block btn-lg" href="{{ route('checkout.page') }}">Checkout Now!</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @include('partial.sweet_alert')
    <script src="{{ asset('js/cart/cart.js') }}"></script>
@endsection