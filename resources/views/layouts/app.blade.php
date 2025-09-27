<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Navbar global --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/home') }}">MyDashboard</a>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a href="{{ url('/logout') }}" class="nav-link">Logout</a></li>
                @else
                    <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        {{-- Di sinilah konten halaman lain ditampilkan --}}
        @yield('content')
    </div>
</body>
</html>
