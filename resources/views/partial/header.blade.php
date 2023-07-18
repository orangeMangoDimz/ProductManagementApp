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
                            Username
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href='#'>Logout</a></li>
                        </ul>
                    </li>
                @else
                    <a class="btn btn-primary me-1 me-3" href="#">Login</a>
                    <a class="btn btn-light" href="#">Register</a>
                @endauth
            </ul>
        </div>
    </div>
</nav>
