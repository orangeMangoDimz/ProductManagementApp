@extends('app.auth')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
@endsection

@section('content')
    <main class="card p-3 form-signin w-100 m-auto">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            {{-- email --}}
            <div class="form-floating">
                <input type="email" class="form-control 
                @error('email') is-invalid @enderror"
                    id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
            </div>

            {{-- password --}}
            <div class="form-floating">
                <input type="password" class="form-control 
                @error('password') is-invalid @enderror"
                    id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            {{-- remember_me --}}
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1">
                    Remember me
                </label>
            </div>

            {{-- show error message --}}
            <?php $dummyVarError = ['email', 'password']; ?>
            @foreach ($dummyVarError as $error)
                @error($error)
                    <div class="text-danger mb-3 bg-danger-subtle p-3 text-center fw-semibold">
                        {{ $message }}
                    </div>
                @enderror
            @endforeach

            {{-- sign up / register --}}
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
            <p class="register-link">Don't have account ? <a href="{{ route('register.page') }}">Create new account here</a>
            </p>

        </form>
    </main>
@endsection

@section('scripts')
    {{-- @include('partial.sweet_alert') --}}
@endsection
