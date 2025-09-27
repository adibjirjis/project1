@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Kategori</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis</label>
            <select name="type" class="form-select" required>
                <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
