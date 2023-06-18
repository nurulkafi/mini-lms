<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\MataKuliah;
use App\Models\MateriPembelajaran;
use Illuminate\Http\Request;
use Alert;

class MateriPembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Materi Pembelajaran";
        $data  = MateriPembelajaran::get();
        return view('admin.materi-pembelajaran.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Form Materi Pembelajaran";
        $matkul = MataKuliah::get();
        return view('admin.materi-pembelajaran.form', compact('title', 'matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->file('file')[0]);
        try {
            $materi = MateriPembelajaran::create([
                'pertemuan' => $request->pertemuan,
                'mata_kuliah_id' => $request->mata_kuliah,
                'jenis_materi' => $request->jenis_materi,
                'deskripsi' => $request->deskripsi,
            ]);
            if ($materi) {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    for ($i = 0; $i < count($file); $i++) {
                        $fileName = $file[$i]->getClientOriginalName();
                        $filePath = $file[$i]->storeAs('uploads/' . time(), $fileName, 'public'); // Simpan file di direktori public/storage/uploads
                        File::create([
                            'materi_pembelajaran_id' => $materi->id,
                            'nama_file' => $fileName,
                            'dir_file' => time()
                        ]);
                    }
                }
                if ($materi->jenis_materi == 1) {
                    Alert::success('Informasi', 'Tambah Data Berhasil,Silahkan buat soal kuis!');
                    return redirect('admin/kuis/' . $materi->id);
                } else {
                    Alert::success('Informasi', 'Tambah Data Berhasil');
                    return redirect('admin/materi-pembelajaran');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/materi-pembelajaran');
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
        $data = MateriPembelajaran::findOrFail($id);
        $title = "Form Edit Materi Pembelajaran";
        $matkul = MataKuliah::get();
        $file = File::where('materi_pembelajaran_id', $id)->get();
        return view('admin.materi-pembelajaran.form_edit', compact('title', 'data', 'matkul', 'file'));
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
        try {
            $materi = MateriPembelajaran::findOrFail($id)->update([
                'mata_kuliah_id' => $request->mata_kuliah,
                'jenis_materi' => $request->jenis_materi,
                'deskripsi' => $request->deskripsi,
            ]);
            if ($materi) {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    for ($i = 0; $i < count($file); $i++) {
                        $fileName = $file[$i]->getClientOriginalName();
                        $filePath = $file[$i]->storeAs('uploads/' . time(), $fileName, 'public'); // Simpan file di direktori public/storage/uploads
                        File::create([
                            'materi_pembelajaran_id' => $id,
                            'nama_file' => $fileName,
                            'dir_file' => time()
                        ]);
                    }
                }
                if ($request->jenis_materi == 1) {
                    return redirect('admin/kuis/' . $materi->id);
                } else {
                    Alert::success('Informasi', 'Update Data Berhasil');
                    return redirect('admin/materi-pembelajaran');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/materi-pembelajaran');
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
            $data = MateriPembelajaran::findOrFail($id)->delete();
            Alert::success('Informasi', 'Hapus Data Berhasil');
            return redirect('admin/materi-pembelajaran');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/materi-pembelajaran');
        }
    }
    public function pertemuanCheck($id)
    {
        $data = MateriPembelajaran::where('mata_kuliah_id', $id)->orderBy('pertemuan', 'DESC')->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function deleteFile($id)
    {
        try {
            $data = File::findOrFail($id)->delete();
            Alert::success('Informasi', 'Hapus Data Berhasil');
            return redirect('admin/materi-pembelajaran/edit/' . $id);
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/materi-pembelajaran/edit/' . $id);
        }
    }
}
