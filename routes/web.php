<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PublicLocationController;



// CATEGORY CRUD

// index
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

// create form
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

// store data
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

// edit form
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

// update data
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

// delete data
Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


// LOCATION

Route::get('/location', [LocationController::class, 'index'])
    ->name('location.index');


Route::get('/location/create', [LocationController::class, 'create'])
    ->name('location.create');

Route::post('/location/store', [LocationController::class, 'store'])
    ->name('location.store');

Route::get('/location/show/{location}', [LocationController::class, 'show'])
        ->name('location.show');

Route::get('/location/edit/{location}', [LocationController::class, 'edit'])
    ->name('location.edit');

Route::put('/location/update/{location}', [LocationController::class, 'update'])
    ->name('location.update');

Route::delete('/location/destroy/{location}', [LocationController::class, 'destroy'])
    ->name('location.destroy');


Route::get(
    '/',
    [PublicLocationController::class, 'index']
)->name('public.index');



Route::get(
    '/maps/kabupaten/{kabupaten}',
    [PublicLocationController::class, 'categoryKabupaten']
)->name('public.kabupaten.category');

Route::get(
    '/maps/kabupaten/{kabupaten}/{category}',
    [PublicLocationController::class, 'showKabupaten']
)->name('public.kabupaten');


// =====================================
// KECAMATAN
// =====================================

Route::get(
    '/maps/{kecamatan}',
    [PublicLocationController::class, 'categoryKecamatan']
)->name('public.kecamatan.category');

Route::get(
    '/maps/{kecamatan}/{category}',
    [PublicLocationController::class, 'showKecamatan']
)->name('public.kecamatan');







// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/tables', function () {
    return view('table');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/button', function () {
    return view('button');
});

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/card', function () {
    return view('card');
});