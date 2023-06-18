<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MateriPembelajaran extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materi_pembelajaran';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    public function matkul()
    {
        return $this->hasOne(MataKuliah::class,'id','mata_kuliah_id');
    }
    public function file()
    {
        return $this->hasMany(File::class, 'materi_pembelajaran_id', 'id');
    }
    public function hitungNilai($id)
    {
        $pertanyaan_kuis = PertanyaanKuis::where('materi_pembelajaran_id', $id)->get();
        $jumlah_pertanyaan = count($pertanyaan_kuis) ?? 0;
        if ($jumlah_pertanyaan == 0) {
            # code...
            return 0;
        }
        $nilai_per_soal = 100 / $jumlah_pertanyaan;
        $nilai_kuis = 0;
        foreach ($pertanyaan_kuis as $value) {
            # code...
            $jawaban_benar = JawabanKuis::where('pertanyaan_kuis_id', $value->id)->where('JawabanBenar', 1)->first();
            $jawaban_mahasiswa = JawabanMahasiswa::where('pertanyaan_kuis_id', $value->id)->where('user_id',Auth::user()->id)->first();
            if ($jawaban_benar['id'] == $jawaban_mahasiswa['jawaban_kuis_id']) {
                $nilai_kuis += $nilai_per_soal;
            }
        }
        return $nilai_kuis;
    }
}
