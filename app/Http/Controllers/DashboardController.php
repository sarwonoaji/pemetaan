<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;

class DashboardController extends Controller
{
public function dashboard()
{
    return view('dashboard', [
        'totalCategory' => Category::count(),
        'totalLocation' => Location::count(),
        'totalKabupaten' => Location::distinct('kabupaten')->count('kabupaten'),
        'totalKecamatan' => Location::distinct('kecamatan')->count('kecamatan'),
    ]);
}
}