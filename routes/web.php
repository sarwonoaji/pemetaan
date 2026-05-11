<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PublicLocationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');

    // CATEGORY

    Route::get('/category', [CategoryController::class, 'index'])
        ->name('category.index');

    Route::get('/category/create', [CategoryController::class, 'create'])
        ->name('category.create');

    Route::post('/category/store', [CategoryController::class, 'store'])
        ->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])
        ->name('category.edit');

    Route::put('/category/update/{id}', [CategoryController::class, 'update'])
        ->name('category.update');

    Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy'])
        ->name('category.destroy');


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

});


/*
|--------------------------------------------------------------------------
| ROUTE PUBLIC
|--------------------------------------------------------------------------
*/

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

Route::get(
    '/maps/{kecamatan}',
    [PublicLocationController::class, 'categoryKecamatan']
)->name('public.kecamatan.category');

Route::get(
    '/maps/{kecamatan}/{category}',
    [PublicLocationController::class, 'showKecamatan']
)->name('public.kecamatan');