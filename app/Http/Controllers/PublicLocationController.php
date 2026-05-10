<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class PublicLocationController extends Controller
{

    // =====================================
    // HOME
    // =====================================

    public function index()
    {
        $kecamatans = Location::select('kecamatan')
            ->distinct()
            ->orderBy('kecamatan')
            ->get();

        return view(
            'public.index',
            compact('kecamatans')
        );
    }



    // =====================================
    // CATEGORY KECAMATAN
    // =====================================

    public function categoryKecamatan($kecamatan)
    {

        $categories = Location::where(
                'kecamatan',
                $kecamatan
            )
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get();

        return view(
            'public.category-kecamatan',
            compact(
                'kecamatan',
                'categories'
            )
        );
    }



    // =====================================
    // SHOW KECAMATAN
    // =====================================

    public function showKecamatan(
        $kecamatan,
        $category
    )
    {

        $query = Location::where(
            'kecamatan',
            $kecamatan
        );



        // FILTER CATEGORY
        if($category != 'all'){

            $query->where(
                'category',
                $category
            );

        }



        $locations = $query
            ->latest()
            ->get();

        return view(
            'public.show',
            compact(
                'locations',
                'kecamatan',
                'category'
            )
        );
    }



    // =====================================
    // CATEGORY KABUPATEN
    // =====================================

    public function categoryKabupaten($kabupaten)
    {

        $categories = Location::where(
                'kabupaten',
                $kabupaten
            )
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get();

        return view(
            'public.category-kabupaten',
            compact(
                'kabupaten',
                'categories'
            )
        );
    }



    // =====================================
    // SHOW KABUPATEN
    // =====================================

    public function showKabupaten(
        $kabupaten,
        $category
    )
    {

        $query = Location::where(
            'kabupaten',
            $kabupaten
        );



        // FILTER CATEGORY
        if($category != 'all'){

            $query->where(
                'category',
                $category
            );

        }



        $locations = $query
            ->latest()
            ->get();

        return view(
            'public.show-kabupaten',
            compact(
                'locations',
                'kabupaten',
                'category'
            )
        );
    }

}