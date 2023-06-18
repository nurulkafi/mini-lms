<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Alert;
use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();
        $title = 'Mahasiswa';
        return view('admin.mahasiswa.index', compact('data', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Form Tambah Mahasiswa";
        return view('admin.mahasiswa.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'email' => ['required', 'string', 'email', 'max:255'],
                'nama' => ['required'],
                'tgl_lahir' => ['date', 'required'],
                'nim' => ['required'],
                'password' => ['required']
            ],
            [
                // 'email.required' => 'Email wajib diisi!',
                'password.required' => 'Password wajib diisi!',
                'tgl_lahir.required' => 'Tanggal Lahir wajib diisi!',
                'nama.required' => 'Nama wajib diisi!',
                'nim.required' => 'Nim wajib diisi!',
            ]

        );
        try {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->nim,
                'password' => bcrypt($request->password)
            ]);
            if ($user) {
                Mahasiswa::create([
                    'nama' =>  $request->nama,
                    'user_id' =>  $user->id,
                    'tanggal_lahir' =>  $request->tgl_lahir,
                    'nim' =>  $request->nim,
                ]);
                $user->assignRole(2); //mahasiswa
                Alert::success('Informasi', 'Tambah Data Berhasil');
                return redirect('admin/mahasiswa');
            }
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mahasiswa');
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
        $title = "Form Ubah Mahasiswa";
        $data = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.formEdit', compact('title', 'data'));
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
            $data = Mahasiswa::findOrFail($id);

            $data->update([
                'nama' =>  $request->nama,
                'tanggal_lahir' =>  $request->tgl_lahir,
                'nim' =>  $request->nim,
            ]);
            Alert::success('Informasi', 'Ubah Data Berhasil');
            return redirect('admin/mahasiswa');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mahasiswa');
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
        try {
            $data = Mahasiswa::findOrFail($id);
            User::findOrFail($data->user_id)->delete();
            $data->delete();
            Alert::success('Informasi', 'Hapus Data Berhasil');
            return redirect('admin/mahasiswa');
        } catch (\Throwable $th) {
            Alert::error('Informasi', 'Terjadi Kesalahan!');
            return redirect('admin/mahasiswa');
        }
    }
}
