@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Edit Category
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('category.update', $category->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Category</label>

                <input type="text"
                       name="category"
                       class="form-control"
                       value="{{ $category->category }}" required>

            </div>

            <button type="submit"
                    class="btn btn-primary">
                    Update
            </button>

            <a href="{{ route('category.index') }}"
               class="btn btn-secondary">
               Kembali
            </a>

        </form>

    </div>
</div>

@endsection