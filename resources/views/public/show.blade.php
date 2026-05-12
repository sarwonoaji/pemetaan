@extends('layouts.public')

@section('title', 'Lokasi di Kecamatan ' . $kecamatan)
@section('content')

<div class="maps-app">

    {{-- SEARCH --}}
    <div class="top-search">

        <div class="search-wrapper">

            <div class="search-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <input
                type="text"
                id="searchInput"
                placeholder="Cari lokasi di Kecamatan {{ $kecamatan }}"
            >

            <button class="mic-btn">

                <i class="fas fa-search"></i>

            </button>

        </div>

    </div>



   



    {{-- MAP --}}
    <div id="map"></div>



    {{-- DETAIL --}}
    <div id="locationDetail"
         class="location-detail hidden">

        <div class="drag-line"></div>

        <div class="detail-header">

            <div>

                <h3 id="detailTitle">
                    Nama Lokasi
                </h3>

                <div id="detailCategory"
                     class="detail-category">

                    Category

                </div>

            </div>

            <button id="closeDetail"
                    class="close-detail">

                <i class="fas fa-times"></i>

            </button>

        </div>



        <div class="detail-image">

            <img
                id="detailImage"
                src=""
            >

        </div>



        <div class="detail-info">

            <div id="detailKelurahan"></div>

            <div id="detailAlamat"></div>

        </div>



        <div class="detail-action">

            <a href="#"
               id="detailRoute"
               target="_blank"
               class="route-btn">

                <i class="fas fa-route"></i>

                Rute Lokasi

            </a>

        </div>

    </div>

</div>

@endsection



@push('styles')

<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

html,
body{
    margin: 0;
    padding: 0;

    width: 100%;
    height: 100%;

    overflow: hidden;

    font-family: 'Poppins', sans-serif;
}



/* =========================
   APP
========================= */

.maps-app{
    position: fixed;

    inset: 0;

    width: 100%;
    height: 100dvh;

    overflow: hidden;
}



/* =========================
   MAP
========================= */

#map{
    width: 100%;
    height: 100%;
}



/* =========================
   HEADER
========================= */

.maps-header{
    position: absolute;

    top: 82px;
    left: 14px;
    right: 14px;

    z-index: 999;

    background:
    rgba(17,17,17,.9);

    backdrop-filter: blur(14px);

    border-radius: 22px;

    padding: 14px;

    display: flex;
    align-items: center;

    gap: 14px;
}



.maps-badge{
    width: 54px;
    height: 54px;

    border-radius: 18px;

    background:
    linear-gradient(
        135deg,
        #10B981,
        #06B6D4
    );

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;

    font-size: 20px;
}



.maps-header h3{
    color: white;

    font-size: 16px;

    font-weight: 700;

    margin-bottom: 4px;
}



.maps-header p{
    color: rgba(255,255,255,.7);

    font-size: 12px;

    margin: 0;
}



/* =========================
   SEARCH
========================= */

.top-search{
    position: absolute;

    top: max(14px, env(safe-area-inset-top));

    left: 0;
    right: 0;

    z-index: 999;

    display: flex;
    justify-content: center;

    padding: 0 12px;
}



.search-wrapper{
    width: 100%;

    max-width: 520px;

    height: 52px;

    background:
    rgba(28,28,28,.95);

    border-radius: 18px;

    display: flex;
    align-items: center;

    padding: 0 12px;

    backdrop-filter: blur(14px);

    box-shadow:
    0 8px 24px rgba(0,0,0,.25);
}



.search-icon{
    color: #10B981;

    font-size: 18px;

    margin-right: 10px;
}



.search-wrapper input{
    flex: 1;

    border: none;
    outline: none;

    background: transparent;

    color: white;

    font-size: 14px;
}



.search-wrapper input::placeholder{
    color: rgba(255,255,255,.7);
}



.mic-btn{
    width: 36px;
    height: 36px;

    border-radius: 50%;

    border: none;

    background:
    linear-gradient(
        135deg,
        #2563EB,
        #3B82F6
    );

    color: white;

    font-size: 13px;
}



/* =========================
   DETAIL
========================= */

.location-detail{
    position: absolute;

    left: 50%;

    bottom:
    calc(
        62px +
        env(safe-area-inset-bottom)
    );

    transform:
    translateX(-50%);

    width: calc(100% - 16px);

    max-width: 460px;

    background: #111111;

    border-radius: 24px;

    z-index: 999;

    padding: 12px;

    box-shadow:
    0 8px 30px rgba(0,0,0,.35);

    transition: .28s ease;
}



.hidden{
    opacity: 0;

    pointer-events: none;

    transform:
    translateX(-50%)
    translateY(120%);
}



.drag-line{
    width: 50px;
    height: 4px;

    background:
    rgba(255,255,255,.16);

    border-radius: 30px;

    margin: 0 auto 12px;
}



.detail-header{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;

    gap: 10px;

    margin-bottom: 10px;
}



.detail-header h3{
    color: white;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.4;

    margin-bottom: 4px;
}



.detail-category{
    color: #10B981;

    font-size: 12px;
}



.close-detail{
    width: 34px;
    height: 34px;

    border-radius: 50%;

    border: none;

    background:
    rgba(255,255,255,.08);

    color: white;

    font-size: 13px;
}



.detail-image{
    margin-bottom: 12px;
}



.detail-image img{
    width: 100%;

    height: 95px;

    object-fit: cover;

    border-radius: 14px;
}



.detail-info{
    color: rgba(255,255,255,.74);

    line-height: 1.6;

    font-size: 12px;

    margin-bottom: 14px;
}



.route-btn{
    height: 42px;

    border-radius: 12px;

    background:
    linear-gradient(
        135deg,
        #06B6D4,
        #2563EB
    );

    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;
}



/* =========================
   LEAFLET
========================= */

.leaflet-control-attribution,
.leaflet-control-zoom,
.leaflet-popup{
    display: none!important;
}

</style>

@endpush



@push('scripts')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const defaultLat =
    {{ $locations->first()->latitude ?? '-7.683150' }};

const defaultLng =
    {{ $locations->first()->longitude ?? '110.829800' }};



const map = L.map('map').setView(
    [defaultLat, defaultLng],
    13
);



L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; OpenStreetMap'
    }
).addTo(map);



const customIcon = L.icon({

    iconUrl:
    'https://cdn-icons-png.flaticon.com/512/684/684908.png',

    iconSize: [42,42],

    iconAnchor: [21,42]

});



const markers = [];

@foreach($locations as $item)

const marker{{ $item->id }} = L.marker(
    [
        {{ $item->latitude }},
        {{ $item->longitude }}
    ],
    {
        icon: customIcon
    }
).addTo(map);



marker{{ $item->id }}.on('click', function(){

    $('#detailTitle').text(
        '{{ $item->nama_lokasi }}'
    );

    $('#detailCategory').text(
        '{{ $item->category }}'
    );

    $('#detailKelurahan').text(
        'Kelurahan {{ $item->kelurahan }}'
    );

    $('#detailAlamat').text(
        '{{ $item->jalan }}'
    );

    $('#detailImage').attr(
        'src',
        '{{ asset("img/location/".$item->foto) }}'
    );

    $('#detailRoute').attr(
        'href',
        'https://www.google.com/maps/dir/?api=1&destination={{ $item->latitude }},{{ $item->longitude }}'
    );



    $('#locationDetail')
        .removeClass('hidden');



    map.flyTo(
        [
            {{ $item->latitude }},
            {{ $item->longitude }}
        ],
        17
    );

});



markers.push(marker{{ $item->id }});

@endforeach



if(markers.length > 0){

    let group = L.featureGroup(markers);

    map.fitBounds(
        group.getBounds()
    );

}



$('#searchInput').on('keyup', function(){

    let value = $(this)
        .val()
        .toLowerCase();

    @foreach($locations as $item)

    if(

        "{{ strtolower($item->nama_lokasi) }}"
            .includes(value)

        ||

        "{{ strtolower($item->category) }}"
            .includes(value)

        ||

        "{{ strtolower($item->kelurahan) }}"
            .includes(value)

    ){

        map.flyTo(
            [
                {{ $item->latitude }},
                {{ $item->longitude }}
            ],
            17
        );

        marker{{ $item->id }}.fire('click');

    }

    @endforeach

});



$('#closeDetail').on('click', function(){

    $('#locationDetail')
        .addClass('hidden');

});

</script>

@endpush