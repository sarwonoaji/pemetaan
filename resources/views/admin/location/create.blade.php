@extends('layouts.app')

@section('title', 'Tambah Lokasi')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Tambah Lokasi
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('location.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- NAMA LOKASI --}}
            <div class="form-group">

                <label>Nama Lokasi</label>

                <input type="text"
                       name="nama_lokasi"
                       class="form-control"
                       placeholder="Masukkan nama lokasi" required>

            </div>


            {{-- CATEGORY --}}
            <div class="form-group">

                <label>Category</label>

                <select name="category"
                        class="form-control" required>

                    <option value="">
                        -- Pilih Category --
                    </option>

                    @foreach($categories as $category)

                    <option value="{{ $category->category }}">
                        {{ $category->category }}
                    </option>

                    @endforeach

                </select>

            </div>


            {{-- FOTO --}}
            <div class="form-group">

                <label>Foto</label>

                <input type="file"
                       name="foto"
                       class="form-control">

            </div>


            {{-- PROVINSI --}}
            <div class="form-group">

                <label>Provinsi</label>

                <select name="provinsi"
                        id="provinsi"
                        class="form-control"
                        readonly>

                    <option value="">
                        -- Pilih Provinsi --
                    </option>

                </select>

            </div>


            {{-- KABUPATEN --}}
            <div class="form-group">

                <label>Kabupaten / Kota</label>

                <select name="kabupaten"
                        id="kabupaten"
                        class="form-control"
                        readonly>

                    <option value="">
                        -- Pilih Kabupaten --
                    </option>

                </select>

            </div>


            {{-- KECAMATAN --}}
            <div class="form-group">

                <label>Kecamatan</label>

                <select name="kecamatan"
                        id="kecamatan"
                        class="form-control" required>

                    <option value="">
                        -- Pilih Kecamatan --
                    </option>

                </select>

            </div>


            {{-- KELURAHAN --}}
            <div class="form-group">

                <label>Kelurahan</label>

                <select name="kelurahan"
                        id="kelurahan"
                        class="form-control" required>

                    <option value="">
                        -- Pilih Kelurahan --
                    </option>

                </select>

            </div>


            {{-- DESA --}}
            <div class="form-group">

                <label>Desa</label>

                <input type="text"
                       name="desa"
                       class="form-control"
                       placeholder="Masukkan desa" required>

            </div>

             {{-- JALAN --}}
            <div class="form-group">

                <label>Jalan</label>

                <textarea name="jalan"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan nama jalan" required></textarea>

            </div>


            {{-- LATITUDE --}}
            <div class="form-group">

                <label>Latitude</label>

                <input type="text"
                       id="latitude"
                       name="latitude"
                       class="form-control"
                       readonly required>

            </div>


            {{-- LONGITUDE --}}
            <div class="form-group">

                <label>Longitude</label>

                <input type="text"
                       id="longitude"
                       name="longitude"
                       class="form-control"
                       readonly required>

            </div>


            {{-- MAP --}}
            <div class="form-group">

                <label>Pilih Lokasi di Maps</label>

                <div id="map"></div>

                <small class="text-muted">
                    Klik maps untuk mengambil latitude & longitude
                </small>

            </div>


            {{-- BUTTON --}}
            <button class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('location.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection



@push('styles')

<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

    #map{
        height: 450px;
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

    // ID Jawa Tengah
    const JATENG_ID = '33';

    // ID Sukoharjo
    const SUKOHARJO_ID = '3311';



    // =========================================
    // LOAD PROVINSI
    // =========================================

    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => response.json())
        .then(provinces => {

            provinces.forEach(province => {

                // AUTO SELECT JAWA TENGAH
                const selected =
                    province.id == JATENG_ID ? 'selected' : '';

                $('#provinsi').append(
                    `<option value="${province.name}"
                             data-id="${province.id}"
                             ${selected}>
                        ${province.name}
                    </option>`
                );

            });

            // langsung load kabupaten
            loadKabupaten(JATENG_ID);

        });



    // =========================================
    // FUNCTION LOAD KABUPATEN
    // =========================================

    function loadKabupaten(provinceId){

        $('#kabupaten').html(
            '<option value="">Loading...</option>'
        );

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
            .then(response => response.json())
            .then(regencies => {

                $('#kabupaten').html('');

                regencies.forEach(regency => {

                    // AUTO SELECT SUKOHARJO
                    const selected =
                        regency.id == SUKOHARJO_ID ? 'selected' : '';

                    $('#kabupaten').append(
                        `<option value="${regency.name}"
                                 data-id="${regency.id}"
                                 ${selected}>
                            ${regency.name}
                        </option>`
                    );

                });

                // langsung load kecamatan
                loadKecamatan(SUKOHARJO_ID);

            });

    }



    // =========================================
    // FUNCTION LOAD KECAMATAN
    // =========================================

    function loadKecamatan(regencyId){

        $('#kecamatan').html(
            '<option value="">Loading...</option>'
        );

        $('#kelurahan').html(
            '<option value="">-- Pilih Kelurahan --</option>'
        );

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
            .then(response => response.json())
            .then(districts => {

                $('#kecamatan').html(
                    '<option value="">-- Pilih Kecamatan --</option>'
                );

                districts.forEach(district => {

                    $('#kecamatan').append(
                        `<option value="${district.name}"
                                 data-id="${district.id}">
                            ${district.name}
                        </option>`
                    );

                });

            });

    }



    // =========================================
    // CHANGE PROVINSI
    // =========================================

    $('#provinsi').change(function(){

        let provinceId = $(this).find(':selected').data('id');

        loadKabupaten(provinceId);

    });



    // =========================================
    // CHANGE KABUPATEN
    // =========================================

    $('#kabupaten').change(function(){

        let regencyId = $(this).find(':selected').data('id');

        loadKecamatan(regencyId);

    });



    // =========================================
    // LOAD KELURAHAN
    // =========================================

    $('#kecamatan').change(function(){

        let districtId = $(this).find(':selected').data('id');

        $('#kelurahan').html(
            '<option value="">Loading...</option>'
        );

        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
            .then(response => response.json())
            .then(villages => {

                $('#kelurahan').html(
                    '<option value="">-- Pilih Kelurahan --</option>'
                );

                villages.forEach(village => {

                    $('#kelurahan').append(
                        `<option value="${village.name}">
                            ${village.name}
                        </option>`
                    );

                });

            });

    });

});


// ====================================
// DEFAULT LOKASI SUKOHARJO
// ====================================

const defaultLat = -7.680856;
const defaultLng = 110.830689;



// ====================================
// INIT MAP
// ====================================

const map = L.map('map').setView(
    [defaultLat, defaultLng],
    12
);



// ====================================
// TILE OPENSTREETMAP
// ====================================

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; OpenStreetMap'
    }
).addTo(map);



// ====================================
// MARKER
// ====================================

let marker;



// ====================================
// CLICK MAP
// ====================================

map.on('click', function(e){

    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    // isi input
    $('#latitude').val(lat);
    $('#longitude').val(lng);

    // hapus marker lama
    if(marker){
        map.removeLayer(marker);
    }

    // tambah marker baru
    marker = L.marker([lat, lng]).addTo(map);

    // popup
    marker.bindPopup(
        "Latitude : " + lat + "<br>Longitude : " + lng
    ).openPopup();

});

</script>

@endpush