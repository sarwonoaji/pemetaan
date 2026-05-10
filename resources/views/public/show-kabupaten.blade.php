@extends('layouts.public')

@section('content')



{{-- SEARCH --}}
<div class="container-fluid py-3">

    <div class="card shadow border-0 search-card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">

                {{-- TITLE --}}
                <div>

                    <h4 class="font-weight-bold mb-1">

                        {{ $category }}

                    </h4>

                    <div class="text-muted small">

                        Kabupaten {{ $kabupaten }}

                    </div>

                </div>



                {{-- BACK --}}
                <a href="{{ route(
                    'public.kabupaten.category',
                    $kabupaten
                ) }}"
                   class="btn btn-primary btn-sm mt-2 mt-md-0">

                    <i class="fas fa-arrow-left"></i>
                    Category

                </a>

            </div>



            {{-- SEARCH --}}
            <div class="input-group">

                <input type="text"
                       id="searchInput"
                       class="form-control border-0 search-input"
                       placeholder="Cari lokasi, category, kecamatan...">

                <div class="input-group-append">

                    <span class="input-group-text bg-white border-0">

                        <i class="fas fa-search text-primary"></i>

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- MAP --}}
<div class="container-fluid pb-4">

    <div class="card shadow border-0 overflow-hidden">

        <div class="card-body p-2">

            <div id="map"></div>

        </div>

    </div>

</div>

@endsection



@push('styles')

<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

    body{
        background: #f5f6ff;
    }

    .search-card{
        border-radius: 22px;
    }

    .search-input{
        height: 52px;
        font-size: 15px;
        box-shadow: none!important;
        border-radius: 18px;
    }

    .input-group-text{
        border-radius: 18px;
    }

    #map{
        width: 100%;
        height: calc(100vh - 220px);
        border-radius: 20px;
    }



    /* MOBILE */
    @media(max-width: 768px){

        #map{
            height: calc(100vh - 250px);
        }

        .search-input{
            height: 48px;
            font-size: 14px;
        }

    }

</style>

@endpush



@push('scripts')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>



// =====================================
// DEFAULT CENTER
// =====================================

const defaultLat =
    {{ $locations->first()->latitude ?? '-7.683150' }};

const defaultLng =
    {{ $locations->first()->longitude ?? '110.829800' }};



// =====================================
// INIT MAP
// =====================================

const map = L.map('map').setView(
    [defaultLat, defaultLng],
    11
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
// MARKERS
// =====================================

const markers = [];



@foreach($locations as $item)

    const marker{{ $item->id }} = L.marker([
        {{ $item->latitude }},
        {{ $item->longitude }}
    ]).addTo(map);

    marker{{ $item->id }}.bindPopup(`

        <div style="min-width:220px;">

            @if($item->foto)

                <img src="{{ asset('img/location/'.$item->foto) }}"
                     width="100%"
                     height="120"
                     style="
                        object-fit:cover;
                        border-radius:10px;
                        margin-bottom:10px;
                     ">

            @endif

            <div class="font-weight-bold mb-1">

                {{ $item->nama_lokasi }}

            </div>

            <div class="text-primary small mb-1">

                {{ $item->category }}

            </div>

            <div class="small text-muted mb-1">

                Kecamatan {{ $item->kecamatan }}

            </div>

            <div class="small text-muted mb-2">

                {{ $item->jalan }}

            </div>

            <a href="https://www.google.com/maps/dir/?api=1&destination={{ $item->latitude }},{{ $item->longitude }}"
               target="_blank"
               class="btn btn-primary btn-sm w-100">

                <i class="fas fa-route"></i>
                Rute Lokasi

            </a>

        </div>

    `);

    markers.push(marker{{ $item->id }});

@endforeach



// =====================================
// AUTO FIT ALL MARKERS
// =====================================

if(markers.length > 0){

    let group = L.featureGroup(markers);

    map.fitBounds(group.getBounds());

}



// =====================================
// SEARCH AUTO FOCUS MAP
// =====================================

$('#searchInput').on('keyup', function(){

    let value = $(this)
        .val()
        .toLowerCase();

    if(value === ''){

        if(markers.length > 0){

            let group = L.featureGroup(markers);

            map.fitBounds(group.getBounds());

        }

        return;
    }



    @foreach($locations as $item)

        if(

            "{{ strtolower($item->nama_lokasi) }}"
                .includes(value)

            ||

            "{{ strtolower($item->category) }}"
                .includes(value)

            ||

            "{{ strtolower($item->kecamatan) }}"
                .includes(value)

        ){

            map.setView(
                [
                    {{ $item->latitude }},
                    {{ $item->longitude }}
                ],
                17
            );

            marker{{ $item->id }}.openPopup();

        }

    @endforeach

});

</script>

@endpush