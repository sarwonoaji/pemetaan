@extends('layouts.app')

@section('title', 'Edit Lokasi')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Edit Lokasi
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('location.update', $location->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- NAMA LOKASI --}}
            <div class="form-group">

                <label>Nama Lokasi</label>

                <input type="text"
                       name="nama_lokasi"
                       class="form-control"
                       value="{{ $location->nama_lokasi }}">

            </div>


            {{-- CATEGORY --}}
                <div class="form-group">

                    <label>Category</label>

                    <select name="category"
                            class="form-control">

                        @foreach($categories as $category)

                        <option value="{{ $category->category }}"
                            {{ $location->category == $category->category ? 'selected' : '' }}>

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

                <br>

                @if($location->foto)

                    <img src="{{ asset('img/location/'.$location->foto) }}"
                         width="120"
                         class="img-thumbnail">

                @endif

            </div>


            {{-- JALAN --}}
            <div class="form-group">

                <label>Jalan</label>

                <textarea name="jalan"
                          class="form-control"
                          rows="3">{{ $location->jalan }}</textarea>

            </div>


            {{-- PROVINSI --}}
            <div class="form-group">

                <label>Provinsi</label>

                <select name="provinsi"
                        id="provinsi"
                        class="form-control"
                        >


                </select>

            </div>


            {{-- KABUPATEN --}}
            <div class="form-group">

                <label>Kabupaten / Kota</label>

                <select name="kabupaten"
                        id="kabupaten"
                        class="form-control"
                        >

                </select>

            </div>


            {{-- KECAMATAN --}}
            <div class="form-group">

                <label>Kecamatan</label>

                <select name="kecamatan"
                        id="kecamatan"
                        class="form-control">

                </select>

            </div>


            {{-- KELURAHAN --}}
            <div class="form-group">

                <label>Kelurahan</label>

                <select name="kelurahan"
                        id="kelurahan"
                        class="form-control">

                </select>

            </div>


            {{-- DESA --}}
            <div class="form-group">

                <label>Desa</label>

                <input type="text"
                       name="desa"
                       class="form-control"
                       value="{{ $location->desa }}">

            </div>


            {{-- LATITUDE --}}
            <div class="form-group">

                <label>Latitude</label>

                <input type="text"
                       id="latitude"
                       name="latitude"
                       class="form-control"
                       value="{{ $location->latitude }}"
                       readonly>

            </div>


            {{-- LONGITUDE --}}
            <div class="form-group">

                <label>Longitude</label>

                <input type="text"
                       id="longitude"
                       name="longitude"
                       class="form-control"
                       value="{{ $location->longitude }}"
                       readonly>

            </div>


            {{-- MAP --}}
            <div class="form-group">

                <label>Pilih Lokasi di Maps</label>

                <div id="map"></div>

                <small class="text-muted">
                    Klik maps untuk mengubah latitude & longitude
                </small>

            </div>


            {{-- BUTTON --}}
            <button class="btn btn-primary">

                <i class="fas fa-save"></i>
                Update

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

        $('#kabupaten').html(
            '<option value="">Loading...</option>'
        );

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



    // =====================================
    // CHANGE KECAMATAN
    // =====================================

    $('#kecamatan').change(function(){

        let districtId = $(this)
            .find(':selected')
            .data('id');

        loadKelurahan(districtId);

    });

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
    13
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

let marker = L.marker([lat, lng])
    .addTo(map);



// =====================================
// CLICK MAP
// =====================================

map.on('click', function(e){

    const latitude = e.latlng.lat;
    const longitude = e.latlng.lng;

    $('#latitude').val(latitude);
    $('#longitude').val(longitude);

    map.removeLayer(marker);

    marker = L.marker([latitude, longitude])
        .addTo(map);

    marker.bindPopup(
        "Latitude : " + latitude +
        "<br>Longitude : " + longitude
    ).openPopup();

});

</script>

@endpush