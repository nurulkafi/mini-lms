<?php

use App\Http\Controllers\Admin\JadwalPerkuliahan;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\MateriPembelajaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/mahasiswa',[MahasiswaController::class,'index']);
Route::get('admin/mahasiswa/tambah-data', [MahasiswaController::class, 'create']);

Route::get('admin/mata-kuliah', [MataKuliahController::class, 'index']);
Route::get('admin/mata-kuliah/tambah-data', [MataKuliahController::class, 'create']);

Route::get('admin/materi-pembelajaran', [MateriPembelajaranController::class, 'index']);
Route::get('admin/materi-pembelajaran/tambah-data', [MateriPembelajaranController::class, 'create']);

Route::get('admin/jadwal-perkuliahan', [JadwalPerkuliahan::class, 'index']);
Route::get('admin/jadwal-perkuliahan/tambah-data', [JadwalPerkuliahan::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
