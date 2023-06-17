<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPerkuliahan as ModelsJadwalPerkuliahan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Alert;

class JadwalPerkuliahan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Jadwal Perkuliahan';
        $data =  ModelsJadwalPerkuliahan::get();
        return view('admin.jadwal-perkuliahan.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Jadwal Perkuliahan';
        $matkul = MataKuliah::get();
        return view('admin.jadwal-perkuliahan.form',compact('title','matkul'));
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
            $saved = ModelsJadwalPerkuliahan::create([
                'mata_kuliah_id' => $request->mata_kuliah,
                'ruangan' => $request->ruangan,
                'hari' => $request->hari_perkuliahan,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai
            ]);
            Alert::success('Informasi', 'Tambah Data Berhasil');
            return redirect('admin/jadwal-perkuliahan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/jadwal-perkuliahan');
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
        $title = 'Form Edit Jadwal Perkuliahan';
        $matkul = MataKuliah::get();
        $data = ModelsJadwalPerkuliahan::findOrFail($id);
        return view('admin.jadwal-perkuliahan.form_update', compact('title', 'matkul','data'));
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
            $saved = ModelsJadwalPerkuliahan::findOrFail($id)->update([
                'mata_kuliah_id' => $request->mata_kuliah,
                'hari' => $request->hari_perkuliahan,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'ruangan' => $request->ruangan,
            ]);
            Alert::success('Informasi', 'Updat Data Berhasil');
            return redirect('admin/jadwal-perkuliahan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/jadwal-perkuliahan');
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
            $data = ModelsJadwalPerkuliahan::findOrFail($id)->delete();
            Alert::success('Informasi', 'Hapus Data Berhasil');
            return redirect('admin/jadwal-perkuliahan');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/jadwal-perkuliahan');
        }
    }
}
