<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Category;

class LocationController extends Controller
{
     public function index()
    {
        $locations = Location::latest()->get();

        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.location.create', compact('categories'));
    }

    public function show(Location $location)
    {
        return view('admin.location.show', compact('location'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'category' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'jalan' => 'nullable|string',
            'desa' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',   
        ]);

         // upload foto
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = uniqid('location_', true) . '.' . $file->extension();
            $destination = public_path('img/location');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['foto'] = $filename;
        }

        Location::create($data);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location berhasil ditambahkan');
    }

    public function edit(Location $location)
    {
        $categories = Category::all();

        return view('admin.location.edit', compact('location', 'categories'));
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'category' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'jalan' => 'nullable|string',
            'desa' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ]);

          // upload foto baru
    if ($request->file('foto')) {

        // hapus foto lama jika ada
        if ($location->foto) {
            $oldFoto = public_path('img/location/' . $location->foto);

            if (file_exists($oldFoto)) {
                unlink($oldFoto);
            }
        }

        // upload foto baru
        $file = $request->file('foto');
        $filename = uniqid('location_', true) . '.' . $file->extension();
        $destination = public_path('img/location');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        $data['foto'] = $filename;
    }

        $location->update($data);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location berhasil diperbarui');
    }

    public function destroy(Location $location)
    {
         // hapus foto jika ada
        if ($location->foto) {
            $fotoPath = public_path('img/location/' . $location->foto);

            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $location->delete();

        return back()->with('success', 'Location berhasil dihapus');
    }
}
