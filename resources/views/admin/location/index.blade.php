@extends('layouts.app')

@section('title', 'Data Lokasi')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Data Lokasi
</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">

        <h6 class="m-0 font-weight-bold text-primary">
            Table Lokasi
        </h6>

        <a href="{{ route('location.create') }}"
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

            <table class="table table-bordered"
                   id="dataTable"
                   width="100%"
                   cellspacing="0">

                <thead class="thead-light">

                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Lokasi</th>
                        <th>Category</th>
                        <th>Kecamatan</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($locations as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            @if($item->foto)

                                <img src="{{ asset('img/location/'.$item->foto) }}"
                                     width="80">

                            @endif

                        </td>

                        <td>
                            {{ $item->nama_lokasi }}
                        </td>

                        <td>
                            {{ $item->category }}
                        </td>

                        <td>
                            {{ $item->kecamatan }}
                        </td>

                        <td>
                            {{ $item->latitude }}
                        </td>

                        <td>
                            {{ $item->longitude }}
                        </td>

                        <td>

                            <div class="d-flex align-items-center"
                                style="gap: 6px;">

                                {{-- SHOW --}}
                                <a href="{{ route('location.show', $item->id) }}"
                                class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route('location.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- DELETE --}}
                                <form action="{{ route('location.destroy', $item->id) }}"
                                    method="POST"
                                    class="m-0">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

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

    $('#dataTable').DataTable();

});

</script>

@endpush