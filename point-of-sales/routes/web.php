<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);
Route::get('kali', [BelajarController::class, 'kali']);
Route::get('bagi', [BelajarController::class, 'bagi']);
Route::get('bagi', [BelajarController::class, 'bagi']);
Route::get('login', [LoginController::class, 'login']);

Route::post('action-tambah', [BelajarController::class, 'actionTambah']);
Route::post('action-kurang', [BelajarController::class, 'actionKurang']);
Route::post('action-bagi', [BelajarController::class, 'actionBagi']);
Route::post('action-kali', [BelajarController::class, 'actionKali']);
Route::post('action-login', [LoginController::class, 'actionLogin']);
