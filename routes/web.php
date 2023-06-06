<?php

use App\Http\Controllers\Admin\JadwalPerkuliahan;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\MateriPembelajaranController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        if (Auth::user()->hasRole('mahasiswa')) {
            return redirect('/mata-kuliah');
        } elseif (Auth::user()->hasRole('admin')) {
            return redirect('/admin/mahasiswa');
        }
    } else {
        return redirect('/login');
    }
});
Route::get('admin/mahasiswa',[MahasiswaController::class,'index']);
Route::get('admin/mahasiswa/tambah-data', [MahasiswaController::class, 'create']);
Route::post('admin/mahasiswa/proses-tambah-data', [MahasiswaController::class, 'store']);
Route::get('admin/mahasiswa/edit-data/{id}', [MahasiswaController::class, 'edit']);
Route::delete('admin/mahasiswa/hapus-data/{id}', [MahasiswaController::class, 'destroy']);
Route::post('admin/mahasiswa/proses-edit-data/{id}', [MahasiswaController::class, 'update']);

Route::get('admin/mata-kuliah', [MataKuliahController::class, 'index']);
Route::get('admin/mata-kuliah/tambah-data', [MataKuliahController::class, 'create']);

Route::get('admin/materi-pembelajaran', [MateriPembelajaranController::class, 'index']);
Route::get('admin/materi-pembelajaran/tambah-data', [MateriPembelajaranController::class, 'create']);

Route::get('admin/jadwal-perkuliahan', [JadwalPerkuliahan::class, 'index']);
Route::get('admin/jadwal-perkuliahan/tambah-data', [JadwalPerkuliahan::class, 'create']);


Route::get('mata-kuliah', [FrontController::class, 'index']);
Route::get('mata-kuliah/detail', [FrontController::class, 'detail']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
