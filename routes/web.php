<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// get: hanya bisa melihat dan membaca
// post: bisa tambah data ubah data (form)
// put: untuk mengubah data (form)
// delete: hapus data (form)

Route::get('/belajar', [App\Http\Controllers\BelajarController::class, 'index']);
Route::get('tambah', [App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::get('edit/{id}', [App\Http\Controllers\BelajarController::class, 'update']);
Route::post('tambah-action', [App\Http\Controllers\BelajarController::class, 'tambahAction'])->name('tambah-action');
