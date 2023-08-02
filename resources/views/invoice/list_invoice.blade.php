@extends('layout.app')

@section('title', 'Invoice')

@section('content')
    <div class="container card">
        @foreach ($invoices as $invoice)
            <div class="card-body">
                <div class="container">
                    <div class="col-md-12">
                        <div class="col-6">
                            <h3 class="fw-bold">Invoice ID : {{ $invoice->id }}</h3>
                        </div>
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span class="fw-bold">{{ auth()->user()->username }}</span></li>
                                <li class="text-muted">Street, City</li>
                                <li class="text-muted">State, Country</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $num = 1;
                                $idx = 0;
                                $totalPrice = 0; ?>
                                @foreach ($products[$invoice->id] as $product)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>Rp {{ number_format($product->stock * $product->price, 2) }}</td>
                                    </tr>
                                    <?php $totalPrice += $product->stock * $product->price; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between text-muted ms-3"><span
                                        class="text-black me-4">SubTotal</span>Rp {{ number_format($totalPrice, 2) }}</li>
                                <li class="d-flex justify-content-between text-muted ms-3 mt-2"><span
                                        class="text-black me-4">Delivery Fee</span>Rp {{ number_format(10000) }}</li>
                                <li class="d-flex justify-content-between text-muted ms-3 mt-2"><span
                                        class="text-black me-4">Administration Fee</span>Rp {{ number_format(1000) }}</li>
                            </ul>
                        </div>
                        <h3 class="text-black float-start fw-bold d-flex justify-content-between">
                            <span class="text-black me-3"> Total Amount</span>
                            <span style="font-size: 25px;">Rp {{ number_format($totalPrice + 10000 + 1000) }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- paggination --}}
        <div class="pt-3 pb-3 ps-4">
            {{ $invoices->links() }}
        </div>
    </div>
@endsection
