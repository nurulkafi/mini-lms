<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\JawabanKuis;
use App\Models\MateriPembelajaran;
use App\Models\PertanyaanKuis;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        // echo 'kuis';
        $title = "Form Edit Materi Pembelajaran";
        $data = PertanyaanKuis::where('materi_pembelajaran_id',$id)->get();
        $matpem = MateriPembelajaran::where('id',$id)->first();
        return view('admin.materi-pembelajaran.kuis.form', compact('data','title', 'id','matpem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        // dd($request->all());
        try {
            $saved = PertanyaanKuis::create([
                'materi_pembelajaran_id' => $id,
                'Pertanyaan' => $request->question
            ]);
            if ($saved) {
                $options = ['A', 'B', 'C', 'D', 'E'
                ];

                foreach ($options as $option) {
                    JawabanKuis::create([
                        'pertanyaan_kuis_id' => $saved->id,
                        'opsi' => $option,
                        'deskripsiJawaban' => $request->{'option' . $option},
                        'JawabanBenar' => ($request->correctAnswer == $option) ? true : false
                    ]);
                }
            }
            Alert::success('Informasi', 'Tambah Data Berhasil');
            return redirect('admin/kuis/' . $id);
        } catch (\Throwable $th) {
            throw $th;exit;
            Alert::error(
                'Informasi',
                'Terjadi Kesalahan!'
            );
            return redirect('admin/kuis/' . $id);
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
