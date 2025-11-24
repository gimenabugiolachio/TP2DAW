<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Sistema')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('clients.index') }}">
            SysCo
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('clients*') ? 'active' : '' }}"
                       href="{{ route('clients.index') }}">
                        Clientes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
                       href="{{ route('users.index') }}">
                        Usuarios
                    </a>
                </li>

            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">Salir</button>
            </form>
        </div>

    </div>
</nav>

<main class="container mt-4" style="max-width: 1100px;">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')

</main>

<footer class="bg-light text-center py-3 mt-4 border-top">
    <small class="text-muted">Gimena Bugiolachio - TP2</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
