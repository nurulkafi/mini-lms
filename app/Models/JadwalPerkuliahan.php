<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JadwalPerkuliahan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_perkuliahan';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    public function matkul()
    {
        return $this->hasOne(MataKuliah::class, 'id', 'mata_kuliah_id');
    }
    public function checkAbsensi($id)
    {
        $data = Absensi::where('mata_kuliah_id', $id)
            ->where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())
            ->get();
        $hitung = count($data) ?? 0;
        return $hitung;
    }

}
