{{-- CATEGORY --}}
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


// ==========================
// MAP
// ==========================

const defaultLat = $('#latitude').val() || -7.680856;
const defaultLng = $('#longitude').val() || 110.830689;

const map = L.map('map').setView([defaultLat, defaultLng], 12);

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; OpenStreetMap'
    }
).addTo(map);

let marker;

if($('#latitude').val() && $('#longitude').val()){

    marker = L.marker([
        $('#latitude').val(),
        $('#longitude').val()
    ]).addTo(map);

}

map.on('click', function(e){

    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    $('#latitude').val(lat);
    $('#longitude').val(lng);

    if(marker){
        map.removeLayer(marker);
    }

    marker = L.marker([lat, lng]).addTo(map);

});

</script>

@endpush