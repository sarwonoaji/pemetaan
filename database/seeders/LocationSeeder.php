<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [

            [
                'nama_lokasi' => 'Masjid Agung Sukoharjo',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Jenderal Sudirman No. 1',
                'desa' => 'Gayam',
                'kelurahan' => 'Gayam',
                'kecamatan' => 'Sukoharjo',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.683150',
                'longitude' => '110.829800',
            ],

            [
                'nama_lokasi' => 'Kopi Senja Sukoharjo',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Veteran No. 12',
                'desa' => 'Jetis',
                'kelurahan' => 'Jetis',
                'kecamatan' => 'Sukoharjo',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.691240',
                'longitude' => '110.831450',
            ],

            [
                'nama_lokasi' => 'Taman Budaya Sukoharjo',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Slamet Riyadi',
                'desa' => 'Bulakan',
                'kelurahan' => 'Bulakan',
                'kecamatan' => 'Sukoharjo',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.680110',
                'longitude' => '110.845000',
            ],

            [
                'nama_lokasi' => 'Cafe Tengah Kota',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Ahmad Yani No. 20',
                'desa' => 'Joho',
                'kelurahan' => 'Joho',
                'kecamatan' => 'Sukoharjo',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.695210',
                'longitude' => '110.820120',
            ],

            [
                'nama_lokasi' => 'Wisata Embung Pengantin',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Raya Tawangsari',
                'desa' => 'Tawangsari',
                'kelurahan' => 'Tawangsari',
                'kecamatan' => 'Tawangsari',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.741230',
                'longitude' => '110.768900',
            ],

            [
                'nama_lokasi' => 'Warung Kopi Pojok',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Raya Solo',
                'desa' => 'Makamhaji',
                'kelurahan' => 'Makamhaji',
                'kecamatan' => 'Kartasura',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.557100',
                'longitude' => '110.767800',
            ],

            [
                'nama_lokasi' => 'Masjid Al Ikhlas',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Melati',
                'desa' => 'Kartasura',
                'kelurahan' => 'Kartasura',
                'kecamatan' => 'Kartasura',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.551230',
                'longitude' => '110.741210',
            ],

            [
                'nama_lokasi' => 'Taman Kota Sukoharjo',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Pemuda',
                'desa' => 'Banmati',
                'kelurahan' => 'Banmati',
                'kecamatan' => 'Sukoharjo',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.682200',
                'longitude' => '110.833200',
            ],

            [
                'nama_lokasi' => 'Coffee Time Grogol',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Ir. Soekarno',
                'desa' => 'Madegondo',
                'kelurahan' => 'Madegondo',
                'kecamatan' => 'Grogol',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.603210',
                'longitude' => '110.807600',
            ],

            [
                'nama_lokasi' => 'Masjid Baiturrahman',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Solo Baru',
                'desa' => 'Langenharjo',
                'kelurahan' => 'Langenharjo',
                'kecamatan' => 'Grogol',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.598300',
                'longitude' => '110.817500',
            ],

            [
                'nama_lokasi' => 'Bukit Pandang Sukoharjo',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Raya Bulu',
                'desa' => 'Bulu',
                'kelurahan' => 'Bulu',
                'kecamatan' => 'Bulu',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.721000',
                'longitude' => '110.889000',
            ],

            [
                'nama_lokasi' => 'Kedai Kopi Nusantara',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Raya Weru',
                'desa' => 'Weru',
                'kelurahan' => 'Weru',
                'kecamatan' => 'Weru',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.808000',
                'longitude' => '110.779000',
            ],

            [
                'nama_lokasi' => 'Masjid Al Huda',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Raya Mojolaban',
                'desa' => 'Mojolaban',
                'kelurahan' => 'Mojolaban',
                'kecamatan' => 'Mojolaban',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.645000',
                'longitude' => '110.857000',
            ],

            [
                'nama_lokasi' => 'Taman Bermain Anak',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Anggrek',
                'desa' => 'Nguter',
                'kelurahan' => 'Nguter',
                'kecamatan' => 'Nguter',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.729000',
                'longitude' => '110.838000',
            ],

            [
                'nama_lokasi' => 'Cafe Malam Sukoharjo',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Diponegoro',
                'desa' => 'Bendosari',
                'kelurahan' => 'Bendosari',
                'kecamatan' => 'Bendosari',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.700000',
                'longitude' => '110.840000',
            ],

            [
                'nama_lokasi' => 'Masjid Jami Al Falah',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Raya Polokarto',
                'desa' => 'Polokarto',
                'kelurahan' => 'Polokarto',
                'kecamatan' => 'Polokarto',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.655000',
                'longitude' => '110.901000',
            ],

            [
                'nama_lokasi' => 'Embung Tirto',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Raya Gatak',
                'desa' => 'Gatak',
                'kelurahan' => 'Gatak',
                'kecamatan' => 'Gatak',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.612000',
                'longitude' => '110.740000',
            ],

            [
                'nama_lokasi' => 'Kedai Kopi Pagi',
                'category_id' => 2,
                'foto' => null,
                'jalan' => 'Jl. Raya Baki',
                'desa' => 'Baki',
                'kelurahan' => 'Baki',
                'kecamatan' => 'Baki',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.620000',
                'longitude' => '110.820000',
            ],

            [
                'nama_lokasi' => 'Masjid Nurul Huda',
                'category_id' => 1,
                'foto' => null,
                'jalan' => 'Jl. Raya Grogol',
                'desa' => 'Telukan',
                'kelurahan' => 'Telukan',
                'kecamatan' => 'Grogol',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.590000',
                'longitude' => '110.815000',
            ],

            [
                'nama_lokasi' => 'Wisata Alam Sukoharjo',
                'category_id' => 3,
                'foto' => null,
                'jalan' => 'Jl. Raya Bulu',
                'desa' => 'Kamal',
                'kelurahan' => 'Kamal',
                'kecamatan' => 'Bulu',
                'kabupaten' => 'Sukoharjo',
                'provinsi' => 'Jawa Tengah',
                'latitude' => '-7.750000',
                'longitude' => '110.880000',
            ],

        ];



        foreach ($locations as $location) {

            Location::create($location);

        }
    }
}