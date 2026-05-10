@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Tambah Data
</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Input
        </h6>
    </div>

    <div class="card-body">

        <form>

            <div class="form-group">
                <label>Nama</label>

                <input type="text"
                       class="form-control"
                       placeholder="Masukkan nama">
            </div>

            <div class="form-group">
                <label>Jabatan</label>

                <input type="text"
                       class="form-control"
                       placeholder="Masukkan jabatan">
            </div>

            <div class="form-group">
                <label>Kantor</label>

                <input type="text"
                       class="form-control"
                       placeholder="Masukkan kantor">
            </div>

            <div class="form-group">
                <label>Umur</label>

                <input type="number"
                       class="form-control"
                       placeholder="Masukkan umur">
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>

                <input type="date"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Gaji</label>

                <input type="number"
                       class="form-control"
                       placeholder="Masukkan gaji">
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="/tables" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection