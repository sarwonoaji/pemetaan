@extends('layouts.app')

@section('title', 'Data Category')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Data Category
</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">

        <h6 class="m-0 font-weight-bold text-primary">
            Table Category
        </h6>

        <a href="{{ route('category.create') }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i>
            Tambah Data
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead class="thead-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Category</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($categories as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->category }}
                        </td>

                        <td>

                            <a href="{{ route('category.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                               <i class="fas fa-edit"></i>
                               Edit
                            </a>

                            <form action="{{ route('category.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data?')">

                                    <i class="fas fa-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('styles')

<link href="{{ asset('bootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}"
      rel="stylesheet">

@endpush


@push('scripts')

<script src="{{ asset('bootstrap/vendor/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('bootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function () {

    $('#dataTable').DataTable({
        responsive: true
    });

});
</script>

@endpush