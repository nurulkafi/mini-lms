<?php

namespace App\Http\Controllers;

use App\Models\JadwalPerkuliahan;
use App\Models\JawabanMahasiswa;
use App\Models\MateriPembelajaran;
use App\Models\PertanyaanKuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ModifyTableJawabanMahasiswa;
use Alert;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\User;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = JadwalPerkuliahan::get();
        return view('front.layouts.mata-kuliah.index', compact('data'));
    }
    public function detail($id)
    {
        //
        $jadwal = JadwalPerkuliahan::where('mata_kuliah_id', $id)->first();
        $materi = MateriPembelajaran::where('mata_kuliah_id', $id)->get();
        return view('front.layouts.mata-kuliah.detail', compact('materi', 'jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        $data = Mahasiswa::where('user_id',Auth::user()->id)->first();
        return view('front.layouts.setting.index',compact('data'));
    }
    public function submit_setting($id,request $request)
    {
        try {
            $data = Mahasiswa::findOrFail($id);
            $user = User::findOrFail($data->user_id);
            $data->update([
                'nama' =>  $request->nama,
                'tanggal_lahir' =>  $request->tgl_lahir,
            ]);
            $user->update([
                'name' =>  $request->nama,
                'password' => bcrypt($request->password)
            ]);
            Alert::success('Informasi', 'Ubah Data Berhasil');
            return redirect('settings');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('settings');
        }
    }

    public function submit_jawaban($id, request $request)
    {
        try {
            $materi = MateriPembelajaran::findOrFail($id);
            $data = PertanyaanKuis::where('materi_pembelajaran_id', $id)->get();

            foreach ($data as $value) {
                $pertanyaanKey = 'pertanyaan' . $value->id;
                $jawabanKey = 'jawaban' . $value->id;

                $saved = JawabanMahasiswa::create([
                    'user_id' => Auth::user()->id,
                    'pertanyaan_kuis_id' => $request->input($pertanyaanKey),
                    'jawaban_kuis_id' => $request->input($jawabanKey)
                ]);
            }
            Alert::success('Informasi', 'Jawaban sudah terkirim!');
            return redirect('mata-kuliah/detail/' . $materi->mata_kuliah_id);
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('mata-kuliah/detail/' . $materi->mata_kuliah_id);
        }
    }
    public function absensi($id, request $request)
    {
        try {
            $saved = Absensi::create([
                'user_id' => Auth::user()->id,
                'keterangan' => $request->input('keterangan'),
                'mata_kuliah_id' => $id
            ]);

            Alert::success('Informasi', 'Berhasil Melakukan Absensi!');
            return redirect('mata-kuliah/detail/' . $id);
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('mata-kuliah/detail/' . $id);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kuis($id)
    {
        //
        $data = PertanyaanKuis::where('materi_pembelajaran_id', $id)->get();
        $matpem = MateriPembelajaran::findOrFail($id);
        return view('front.layouts.kuis.index', compact('matpem', 'data'));
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
    }
}
