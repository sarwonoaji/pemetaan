@extends('layouts.app')

@section('title', 'Detail Lokasi')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Detail Lokasi
</h1>

<div class="card shadow">

    <div class="card-body">

        {{-- NAMA LOKASI --}}
        <div class="form-group">

            <label>Nama Lokasi</label>

            <input type="text"
                   class="form-control"
                   value="{{ $location->nama_lokasi }}"
                   readonly>

        </div>


        {{-- CATEGORY --}}
        <div class="form-group">

            <label>Category</label>

            <input type="text"
                   class="form-control"
                   value="{{ $location->category->category ?? '-' }}"
                   readonly>

        </div>


        {{-- FOTO --}}
        <div class="form-group">

            <label>Foto</label>

            <br>

            @if($location->foto)

                <img src="{{ asset('img/location/'.$location->foto) }}"
                     class="img-fluid rounded shadow"
                     style="max-width: 300px;">

            @else

                <span class="text-muted">
                    Tidak ada foto
                </span>

            @endif

        </div>


        {{-- JALAN --}}
        <div class="form-group">

            <label>Jalan</label>

            <textarea class="form-control"
                      rows="3"
                      readonly>{{ $location->jalan }}</textarea>

        </div>


        {{-- PROVINSI --}}
        <div class="form-group">

            <label>Provinsi</label>

            <select id="provinsi"
                    class="form-control"
                    disabled>

            </select>

        </div>


        {{-- KABUPATEN --}}
        <div class="form-group">

            <label>Kabupaten / Kota</label>

            <select id="kabupaten"
                    class="form-control"
                    disabled>

            </select>

        </div>


        {{-- KECAMATAN --}}
        <div class="form-group">

            <label>Kecamatan</label>

            <select id="kecamatan"
                    class="form-control"
                    disabled>

            </select>

        </div>


        {{-- KELURAHAN --}}
        <div class="form-group">

            <label>Kelurahan</label>

            <select id="kelurahan"
                    class="form-control"
                    disabled>

            </select>

        </div>


        {{-- DESA --}}
        <div class="form-group">

            <label>Desa</label>

            <input type="text"
                   class="form-control"
                   value="{{ $location->desa }}"
                   readonly>

        </div>


        {{-- LATITUDE --}}
        <div class="form-group">

            <label>Latitude</label>

            <input type="text"
                   class="form-control"
                   value="{{ $location->latitude }}"
                   readonly>

        </div>


        {{-- LONGITUDE --}}
        <div class="form-group">

            <label>Longitude</label>

            <input type="text"
                   class="form-control"
                   value="{{ $location->longitude }}"
                   readonly>

        </div>


        {{-- MAP --}}
        <div class="form-group">

            <label>Lokasi Maps</label>

            <div id="map"></div>

        </div>


        {{-- BUTTON --}}
        <a href="{{ route('location.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection



@push('styles')

<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

    #map{
        height: 500px;
        width: 100%;
        border-radius: 10px;
    }

</style>

@endpush



@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

$(document).ready(function(){

    // =====================================
    // CONSTANT
    // =====================================

    const JATENG_ID = '33';
    const SUKOHARJO_ID = '3311';

    const selectedKecamatan = "{{ $location->kecamatan }}";
    const selectedKelurahan = "{{ $location->kelurahan }}";



    // =====================================
    // LOAD PROVINSI
    // =====================================

    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => response.json())
        .then(provinces => {

            provinces.forEach(province => {

                const selected =
                    province.id == JATENG_ID
                    ? 'selected'
                    : '';

                $('#provinsi').append(
                    `<option value="${province.name}"
                             data-id="${province.id}"
                             ${selected}>
                        ${province.name}
                    </option>`
                );

            });

            loadKabupaten(JATENG_ID);

        });



    // =====================================
    // LOAD KABUPATEN
    // =====================================

    function loadKabupaten(provinceId){

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
            .then(response => response.json())
            .then(regencies => {

                $('#kabupaten').html('');

                regencies.forEach(regency => {

                    const selected =
                        regency.id == SUKOHARJO_ID
                        ? 'selected'
                        : '';

                    $('#kabupaten').append(
                        `<option value="${regency.name}"
                                 data-id="${regency.id}"
                                 ${selected}>
                            ${regency.name}
                        </option>`
                    );

                });

                loadKecamatan(SUKOHARJO_ID);

            });

    }



    // =====================================
    // LOAD KECAMATAN
    // =====================================

    function loadKecamatan(regencyId){

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
            .then(response => response.json())
            .then(districts => {

                $('#kecamatan').html('');

                districts.forEach(district => {

                    const selected =
                        district.name == selectedKecamatan
                        ? 'selected'
                        : '';

                    $('#kecamatan').append(
                        `<option value="${district.name}"
                                 data-id="${district.id}"
                                 ${selected}>
                            ${district.name}
                        </option>`
                    );

                });

                const districtId =
                    $('#kecamatan').find(':selected').data('id');

                if(districtId){
                    loadKelurahan(districtId);
                }

            });

    }



    // =====================================
    // LOAD KELURAHAN
    // =====================================

    function loadKelurahan(districtId){

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
            .then(response => response.json())
            .then(villages => {

                $('#kelurahan').html('');

                villages.forEach(village => {

                    const selected =
                        village.name == selectedKelurahan
                        ? 'selected'
                        : '';

                    $('#kelurahan').append(
                        `<option value="${village.name}"
                                 ${selected}>
                            ${village.name}
                        </option>`
                    );

                });

            });

    }

});



// =====================================
// DEFAULT LOCATION
// =====================================

const lat =
    {{ $location->latitude ?? '-7.680856' }};

const lng =
    {{ $location->longitude ?? '110.830689' }};



// =====================================
// INIT MAP
// =====================================

const map = L.map('map').setView(
    [lat, lng],
    15
);



// =====================================
// TILE
// =====================================

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; OpenStreetMap'
    }
).addTo(map);



// =====================================
// MARKER
// =====================================

const marker = L.marker([lat, lng])
    .addTo(map);



// =====================================
// POPUP NAMA LOKASI
// =====================================

marker.bindPopup(`
    <b>{{ $location->nama_lokasi }}</b>
`).openPopup();

</script>

@endpush