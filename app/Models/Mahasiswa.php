<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mahasiswa';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    public function jumlahPertemuan($id){
        $data = MateriPembelajaran::where('mata_kuliah_id',$id)->get();
        return count($data) ?? 0;
    }
    public function jumlahAbsensi($user_id,$id,$keterangan)
    {
        $data = Absensi::where('mata_kuliah_id', $id)->where('user_id',$user_id)->where('keterangan',$keterangan)->get();
        return count($data) ?? 0;
    }
}
