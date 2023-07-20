<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-light fw-bold" href="{{ route('home.page') }}">ProductManagementApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href='{{ route('logout') }}'>Logout</a></li>
                        </ul>
                    </li>
                    <button class="btn btn-dark" aria-expanded="false">
                       My Cart <span class="ms-2 badge text-bg-primary">{{ count( (array)session('cart')) }}</span>
                    </button>
                @else
                    <a class="btn btn-primary me-1 me-3" href="{{ route('login.page') }}">Login</a>
                    <a class="btn btn-light" href="{{ route('register.page') }}">Register</a>
                @endauth
            </ul>
        </div>
    </div>
</nav>
