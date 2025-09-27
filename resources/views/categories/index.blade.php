@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Kategori</h2>

   
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>
    <a href="{{ route('home') }}" class="btn btn-primary mb-3"> home</a>
    

    {{-- Daftar kategori --}}
    <table class="table table-bordered table-hover">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $i => $c)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $c->name }}</td>
                    <td>
                        <span class="badge {{ $c->type == 'income' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($c->type) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $c) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $c) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus kategori?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
