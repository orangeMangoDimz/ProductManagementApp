@extends('layout.app')

@section('title', 'Home')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endsection


@section('content')

    <main>
        <section class="py-5 text-center container-fluid hero">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-bold mb-3">Product Management App</h1>
                    <p class="lead fw-semibold">
                        Created by: <a
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="https://github.com/orangeMangoDimz">Dimas Dani Zaini</a>
                    </p>
                </div>
            </div>
        </section>

        @if (auth()->user()->username !== 'admin')
            <h3 class="fw-bold mb-3 text-center">All Products</h3>
            <hr class="mb-5">
            {{-- user access --}}
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                        {{-- card 1 --}}
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="card shadow-sm" data-key="#">
                                    <img src="{{ asset('images/product/' . $product->cover) }}" alt="cover"
                                        width="100%">
                                    <div class="card-body">
                                        <div class="card-title-wrapper d-flex justify-content-between align-items-center">
                                            <h4 class="card-title fw-bold">{{ $product->title }}</h4>
                                            <span class="badge text-bg-secondary">{{ $product->category }}</span>
                                        </div>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <div class="d-flex">
                                            <small class="fw-semibold text-danger">Rp {{ $product->price }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- admin access --}}
        @can('admin')
            <section class="container bg-light border p-3 shadow-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center align-middle table-dark text-light">
                                        <tr>
                                            <th>No</th>
                                            <th class="col-2">Prodct Cover</th>
                                            <th>Product Title</th>
                                            <th>Prodict Category</th>
                                            <th class="col-3">Prodict Description</th>
                                            <th>Prodict Stock</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center align-middle">

                                        {{-- product 1 --}}
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>1</td>
                                                <td><img class="w-50 d-block"
                                                        src="{{ asset('images/product/' . $product->cover) }}" alt="cover">
                                                </td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->product_category->name }}</td>
                                                <td class="text-start"> {{ $product->description }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>Rp {{ $product->price }}</td>
                                                <td>
                                                    <form action="{{ route('product.edit', $product->id) }}" method="GET">
                                                        @csrf
                                                        <button class="btn btn-outline-primary" type="submit">Edit</button>
                                                    </form>
                                                    <br>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-primary">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="mt-5 mb-5">
                            <h3 class="fw-bold mb-3 text-start">More Actions</h3>
                            <a class="btn btn-primary me-2" href="{{ route('product.create') }}">Create New Product </a>
                            <a class="btn btn-primary" href="#">View All Invoices
                            </a>
                        </div>

                    </div>
                </div>
                </div>
            </section>
        @endcan

        {{-- paggination --}}
        <div class="container row p-3">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
        </div>
    </main>


@endsection

@section('script')
    {{-- sweetAlert2 notification --}}
    @include('partial.sweet_alert')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection
