<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/siswa', function () {
//     return "<h1>saya siswa</h1>";
// });

// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>saya siswa dengan id $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{nama}', function ($id, $nama) {
//     return "<h1>saya siswa dengan id $id dan nama $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);


// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');


// Route::get('/', [HalamanController::class, 'index']);
// Route::get('/kontak', [HalamanController::class, 'kontak']);
// Route::get('/tentang', [HalamanController::class, 'tentang']);


Route::resource('siswa', SiswaController::class)->middleware('islogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('istamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('istamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('istamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('istamu');
