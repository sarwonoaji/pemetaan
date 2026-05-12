@extends('layouts.app')

@section('title', 'Edit Category')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Tambah Category
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Category</label>

                <input type="text"
                       name="category"
                       class="form-control"
                       placeholder="Masukkan category" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('category.index') }}"
               class="btn btn-secondary">
               Kembali
            </a>

        </form>

    </div>
</div>

@endsection