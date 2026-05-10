@extends('layouts.public')

@section('content')

<div class="maps-app">

    {{-- SEARCH BAR --}}
    <div class="top-search">

        <div class="search-wrapper">

            <div class="search-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <input
                type="text"
                id="searchInput"
                placeholder="Telusuri di sini"
            >

            <button class="mic-btn">

                <i class="fas fa-microphone"></i>

            </button>

        </div>

    </div>



    {{-- MAP --}}
    <div id="map"></div>



    {{-- DETAIL BOTTOM SHEET --}}
    <div id="locationDetail"
         class="location-detail hidden">

        {{-- DRAG --}}
        <div class="drag-line"></div>



        {{-- HEADER --}}
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



        {{-- IMAGE --}}
        <div class="detail-image">

            <img
                id="detailImage"
                src=""
            >

        </div>



        {{-- INFO --}}
        <div class="detail-info">

            <div id="detailKecamatan">
                Kecamatan
            </div>

            <div id="detailAlamat">
                Alamat
            </div>

        </div>



        {{-- ACTION --}}
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

/* =========================
   RESET
========================= */

html,
body{
    margin: 0;
    padding: 0;

    width: 100%;
    height: 100%;

    font-family: 'Poppins', sans-serif;

    background: #f5f5f5;

    overflow: hidden;
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

    background: #000;
}


/* =========================
   MAP
========================= */

#map{
    width: 100%;
    height: 100%;

    z-index: 1;
}



/* =========================
   SEARCH
========================= */

.top-search{
    position: absolute;

    top: max(12px, env(safe-area-inset-top));

    left: 0;
    right: 0;

    z-index: 999;

    display: flex;
    justify-content: center;

    padding: 0 12px;
}



/* SEARCH WRAPPER */
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



/* SEARCH ICON */
.search-icon{
    color: #10B981;

    font-size: 18px;

    margin-right: 10px;
}



/* INPUT */
.search-wrapper input{
    flex: 1;

    border: none;
    outline: none;

    background: transparent;

    color: white;

    font-size: 14px;
}



/* PLACEHOLDER */
.search-wrapper input::placeholder{
    color: rgba(255,255,255,.7);
}



/* MIC */
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

    flex-shrink: 0;
}



/* =========================
   DETAIL SHEET
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



/* HIDDEN */
.hidden{
    opacity: 0;

    pointer-events: none;

    transform:
    translateX(-50%)
    translateY(120%);
}



/* =========================
   DRAG LINE
========================= */

.drag-line{
    width: 50px;
    height: 4px;

    background:
    rgba(255,255,255,.16);

    border-radius: 30px;

    margin: 0 auto 12px;
}



/* =========================
   HEADER
========================= */

.detail-header{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;

    gap: 10px;

    margin-bottom: 10px;
}



/* TITLE */
.detail-header h3{
    color: white;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.4;

    margin-bottom: 4px;
}



/* CATEGORY */
.detail-category{
    color: #10B981;

    font-size: 12px;
}



/* CLOSE */
.close-detail{
    width: 34px;
    height: 34px;

    border-radius: 50%;

    border: none;

    background:
    rgba(255,255,255,.08);

    color: white;

    font-size: 13px;

    flex-shrink: 0;
}



/* =========================
   IMAGE
========================= */

.detail-image{
    margin-bottom: 12px;
}



.detail-image img{
    width: 100%;

    height: 95px;

    object-fit: cover;

    border-radius: 14px;
}



/* =========================
   INFO
========================= */

.detail-info{
    color: rgba(255,255,255,.74);

    line-height: 1.6;

    font-size: 12px;

    margin-bottom: 14px;
}



/* =========================
   BUTTON
========================= */

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



/* =========================
   TABLET+
========================= */

@media(min-width:768px){

    .search-wrapper{
        height: 58px;
    }

    .search-wrapper input{
        font-size: 16px;
    }

    .location-detail{
        padding: 16px;

        border-radius: 28px;
    }

    .detail-header h3{
        font-size: 20px;
    }

    .detail-image img{
        height: 160px;
    }

}

</style>
@endpush



@push('scripts')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

// =====================================
// DEFAULT LOCATION
// =====================================

const defaultLat =
    {{ $locations->first()->latitude ?? '-7.683150' }};

const defaultLng =
    {{ $locations->first()->longitude ?? '110.829800' }};



// =====================================
// INIT MAP
// =====================================

const map = L.map('map', {
    zoomControl: false
}).setView(
    [defaultLat, defaultLng],
    13
);



// =====================================
// TILE LAYER
// =====================================

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; OpenStreetMap'
    }
).addTo(map);



// =====================================
// CUSTOM ICON
// =====================================

const customIcon = L.icon({

    iconUrl:
    'https://cdn-icons-png.flaticon.com/512/684/684908.png',

    iconSize: [42,42],

    iconAnchor: [21,42]

});



// =====================================
// MARKERS
// =====================================

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




/* CLICK MARKER */
marker{{ $item->id }}.on('click', function(){

    $('#detailTitle').text(
        '{{ $item->nama_lokasi }}'
    );

    $('#detailCategory').text(
        '{{ $item->category }}'
    );

    $('#detailKecamatan').text(
        'Kecamatan {{ $item->kecamatan }}'
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
        17,
        {
            duration: 1.2
        }
    );

});



markers.push(marker{{ $item->id }});

@endforeach



// =====================================
// FIT BOUNDS
// =====================================

if(markers.length > 0){

    let group = L.featureGroup(markers);

    map.fitBounds(
        group.getBounds(),
        {
            padding: [40,40]
        }
    );

}



// =====================================
// SEARCH
// =====================================

$('#searchInput').on('keyup', function(){

    let value = $(this)
        .val()
        .toLowerCase();

    if(value === ''){

        if(markers.length > 0){

            let group =
                L.featureGroup(markers);

            map.fitBounds(
                group.getBounds()
            );

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

        map.flyTo(
            [
                {{ $item->latitude }},
                {{ $item->longitude }}
            ],
            17,
            {
                duration: 1
            }
        );



        $('#detailTitle').text(
            '{{ $item->nama_lokasi }}'
        );

        $('#detailCategory').text(
            '{{ $item->category }}'
        );

        $('#detailKecamatan').text(
            'Kecamatan {{ $item->kecamatan }}'
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

    }

    @endforeach

});



// =====================================
// CLOSE DETAIL
// =====================================

$('#closeDetail').on('click', function(){

    $('#locationDetail')
        .addClass('hidden');

});

</script>

@endpush