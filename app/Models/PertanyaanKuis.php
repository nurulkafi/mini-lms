<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanKuis extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pertanyaan_kuis';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    public function OpsiJawaban($id){
        $data = JawabanKuis::where('pertanyaan_kuis_id',$id)->get();
        return $data;
    }
    public function JawabanBenar($id)
    {
        $data = JawabanKuis::where('pertanyaan_kuis_id', $id)->where('JawabanBenar',1)->first();
        return $data;
    }

}
