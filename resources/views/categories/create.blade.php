@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis</label>
            <select name="type" class="form-select" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
