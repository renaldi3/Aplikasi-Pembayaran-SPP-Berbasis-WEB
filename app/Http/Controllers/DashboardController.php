<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function index()
    {
        $siswa = Siswa::all()->count();
        $petugas = Petugas::all()->count();
        $kelas = Kelas::all()->count();
        $spp = Spp::all()->count();
        $pembayaran = Pembayaran::all()->count();
        $pembayarans = Pembayaran::all();
        return view('dashboard.dashboard',[
            'siswa'=>$siswa,
            'petugas'=>$petugas,
            'kelas'=>$kelas,
            'spp'=>$spp,
            'pembayaran'=>$pembayaran,
        ],['pembayarans'=>$pembayarans]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
