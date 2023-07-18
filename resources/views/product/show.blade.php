@extends('layout.app')

@section('title', 'Product')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product/show.css') }}">
@endsection

@section('content')
    <main>
        <div class="container bg-white p-3 py-4 px-md-5">
            <div
                class="d-flex justify-content-between flex-column flex-md-row
                  align-items-center py-3 border-bottom">
                <h2 class="text-center fw-bold">Jaket Pria</h2>
                <hr>
            </div>
            <div class="row border-bottom">
                <div class="col-lg-6">
                    <img src="{{ asset('imgaes/product/Example-1.jpg') }}" alt="cover" width="100%">
                </div>
                <div class="col-lg-6">
                    <div class="my-3">

                        {{-- admin only --}}
                        {{-- <a href="#" class="btn btn-light">
                            <i class="fa-solid fa-pen-to-square">Edit</i>
                        </a> --}}

                        {{-- admin only --}}
                        {{-- <form class="d-inline" action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">
                                <i class="fa-solid fa-trash-can">Delete</i>
                            </button>
                        </form> --}}

                    </div>
                    <div class="my-3">
                        <h5 class="fw-bold">Product Details : </h5>
                        <p>
                            Category : Jaket Pria <br>
                            Price : Rp 259.000 <br>
                        </p>
                    </div>
                    <div class="my-3">
                        <h5 class="fw-bold">Description : </h5>
                        <p class="story-synopsis fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
            {{-- <div class="row my-4 story-content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </div> --}}
        </div>
    </main>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/story/script.js') }}"></script> --}}
@endsection
