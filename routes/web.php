<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaerahWisataController;
use App\Http\Controllers\KategoriWisataController;
use App\Http\Controllers\TempatWisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'dashboardAdmin']);

Route::resource('daerahWisata', DaerahWisataController::class);
Route::resource('/kategoriWisata', KategoriWisataController::class);
Route::resource('/tempatWisata', TempatWisataController::class);
