<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'petugas_id',
        'siswa_id',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'spp_id',
        'jumlah_bayar',

    ];
    public function siswa()
    {
        return $this->hasOne(Siswa::class,'id','siswa_id');
    }
    public function petugas()
    {
        return $this->hasOne(Petugas::class,'id','petugas_id');
    }
    public function spp()
    {
        return $this->hasOne(Spp::class,'id','spp_id');
    }
}
