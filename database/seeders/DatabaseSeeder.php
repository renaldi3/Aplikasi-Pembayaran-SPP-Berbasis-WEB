<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Kelas::create(['nama_kelas'=>'X RPL 1','kompetensi_keahlian'=>'REKAYASA PERANGKAT LUNAK']);
        Kelas::create(['nama_kelas'=>'X RPL 2','kompetensi_keahlian'=>'REKAYASA PERANGKAT LUNAK']);
        Kelas::create(['nama_kelas'=>'X RPL 3','kompetensi_keahlian'=>'REKAYASA PERANGKAT LUNAK']);
        Kelas::create(['nama_kelas'=>'X TKR 1','kompetensi_keahlian'=>'TEKNIK KENDARAAN RINGAN']);
        Kelas::create(['nama_kelas'=>'X TKR 2','kompetensi_keahlian'=>'TEKNIK KENDARAAN RINGAN']);
        Kelas::create(['nama_kelas'=>'X TKR 3','kompetensi_keahlian'=>'TEKNIK KENDARAAN RINGAN']);
        Kelas::create(['nama_kelas'=>'X TITL 1','kompetensi_keahlian'=>'TEKNIK INSTALASI TENAGA LISTRIK']);
        Kelas::create(['nama_kelas'=>'X TITL 2','kompetensi_keahlian'=>'TEKNIK INSTALASI TENAGA LISTRIK']);
        Kelas::create(['nama_kelas'=>'X TITL 3','kompetensi_keahlian'=>'TEKNIK INSTALASI TENAGA LISTRIK']);
        Kelas::create(['nama_kelas'=>'X TAV 1','kompetensi_keahlian'=>'TEKNIK AUDIO VIDEO']);
        Kelas::create(['nama_kelas'=>'X TAV 2','kompetensi_keahlian'=>'TEKNIK AUDIO VIDEO']);
        Kelas::create(['nama_kelas'=>'X TAV 3','kompetensi_keahlian'=>'TEKNIK AUDIO VIDEO']);

        Spp::create(['tahun'=>'2021','nominal'=>'14000000']);
        Spp::create(['tahun'=>'2022','nominal'=>'15000000']);
        Spp::create(['tahun'=>'2023','nominal'=>'15000000']);
             
        Petugas::create(['username'=>'admin','password'=> bcrypt('123456'),'nama_petugas'=>'Budi Sarif','level'=>'admin']);
        Petugas::create(['username'=>'petugas','password'=> bcrypt('123456'),'nama_petugas'=>'Asep Musaep','level'=>'petugas']);
        
        Siswa::create(['nisn'=>'2021109','nis'=>'123456','nama'=>'Najrul Fedriansyah','password'=> bcrypt('123456'),'kelas_id'=> '1','alamat'=>'Ujung Harapan Bekasi','no_telp'=>'08937654381','spp_id'=>'1']);
        Siswa::create(['nisn'=>'3892338','nis'=>'1234567','nama'=>'Oriko Fadlurahman','password'=> bcrypt('123456'),'kelas_id'=> '4','alamat'=>'Kebalen Ujung Harapan','no_telp'=>'08764938102','spp_id'=>'2']);
        Siswa::create(['nisn'=>'7182371','nis'=>'1234568','nama'=>'Rifqi Suryana','password'=> bcrypt('123456'),'kelas_id'=> '7','alamat'=>'Duta Harapan Bekasi','no_telp'=>'08563789210','spp_id'=>'3']);
        Siswa::create(['nisn'=>'1823782','nis'=>'12345689','nama'=>'Valerian Ismail','password'=> bcrypt('123456'),'kelas_id'=> '10','alamat'=>'Wahana Harapan Bekasi','no_telp'=>'08968745637','spp_id'=>'1']);
    }
}
