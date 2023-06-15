<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Alert;
class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Mata Kuliah";
        $data = MataKuliah::get();
        return view('admin.mata-kuliah.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mata-kuliah.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $saved = MataKuliah::create([
                'nama_mata_kuliah' => $request->nama_mata_kuliah,
            ]);
            Alert::success('Informasi', 'Tambah Data Berhasil');
            return redirect('admin/mata-kuliah');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mata-kuliah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $data = MataKuliah::findOrFail($id);
            $data->update([
                'nama_mata_kuliah' => $request->nama_mata_kuliah,
            ]);
            Alert::success('Informasi', 'Tambah Data Berhasil');
            return redirect('admin/mata-kuliah');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mata-kuliah');
            // dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $data = MataKuliah::findOrFail($id)->delete();
            Alert::success('Informasi', 'Hapus Data Berhasil');
            return redirect('admin/mata-kuliah');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mata-kuliah');
        }
    }
}
