


<nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mb-0 h1 font-montserrat d-none d-lg-block">Admin Dashboard</span>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-white dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fw-bold">{{ auth()->user()->name }}</span><br>
                    <span class="text-muted">{{ auth()->user()->role }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li class="dropdown-header">Manage Account</li>
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                    @if (\Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">API Tokens</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>