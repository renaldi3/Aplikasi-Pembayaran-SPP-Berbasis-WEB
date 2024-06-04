<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
//use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'password',
        'kelas_id',
        'alamat',
        'no_telp',
        'spp_id',
    ];
    public function spp()
    {
        return $this->hasOne(spp::class,'id','spp_id');
    }
    public function kelas()
    {
        return $this->hasOne(kelas::class,'id','kelas_id');
    }
}
