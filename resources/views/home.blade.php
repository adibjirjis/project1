<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Home</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">MyDashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
              

                @guest
                    <!-- Kalau belum login -->
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login')}}">Login</a></li>
                @endguest

                @auth
                    <!-- Kalau sudah login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kelola Kategori</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="border:none;cursor:pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


    <!-- Konten Utama -->
    <div class="container mt-4">
        <div class="row">
            <!-- Card Ringkasan -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Pengguna</h5>
                        <p class="display-6 fw-bold text-primary">120</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Produk</h5>
                        <p class="display-6 fw-bold text-success">85</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Transaksi</h5>
                        <p class="display-6 fw-bold text-danger">56</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
       <div class="card shadow-sm mt-4">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Data Transaksi Terbaru</h5>
    </div>
    <div class="d-flex justify-content-end mb-3">
    @auth
        <a href="{{ route('categories.index') }}" class="btn btn-primary">
            Kelola Kategori
        </a>
    @endauth
</div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $index => $t)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $t->category->name ?? '-' }}</td>
                        <td>{{ $t->description }}</td>
                        <td class="{{ $t->category->type == 'income' ? 'text-success' : 'text-danger' }}">
                            {{ number_format($t->amount, 0, ',', '.') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($t->transaction_date)->format('d-m-Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>