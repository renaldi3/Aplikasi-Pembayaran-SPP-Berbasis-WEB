<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index',['pembayaran'=>$pembayaran]);
    }

    public function history()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.history',['pembayaran'=>$pembayaran]);
    }

    public function laporan()
    {
        $siswa = Siswa::all();
        return view('pembayaran.laporan',['siswa'=>$siswa]);
    }

    public function cetakdata($id)
    {
        $pembayaran = Pembayaran::find($id);
        $cetakdata = Pembayaran::all()->where('id',$id);
        return view('pembayaran.cetakperdata',['cetakdata'=>$cetakdata]);
    }

    public function cetak($tglawal, $tglakhir)
    {
        $cetakdata = Pembayaran::all()->whereBetween('tgl_bayar',[$tglawal, $tglakhir]);
        return view('pembayaran.cetak',['cetakdata'=>$cetakdata]);
    }

    public function create()
    {
        $pembayaran = Pembayaran::all();
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $spp = Spp::all();
        $carbon = Carbon::today()->toDateString();
        return view('pembayaran.create',['pembayaran'=>$pembayaran,'siswa'=>$siswa, 'petugas'=>$petugas,'spp'=>$spp ,'carbon'=>$carbon]);
    }

    public function create2()
    {
        $siswa = Siswa::find($request->siswa_id);
        $spp = Spp::find($siswa->spp_id);
        return view('pembayaran.create',compact('siswa','spp'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'petugas_id'    => 'required',
            'siswa_id'    => 'required',          
            'tgl_bayar'    => 'required',          
            'bulan_dibayar'    => 'required',
            'tahun_dibayar'    => 'required',            
            'spp_id'    => 'required',            
            'jumlah_bayar'    => 'required',            
        ]);
        $pembayaran = Pembayaran::create($validasi);
        
        if ($pembayaran) {
            alert()->success('Berhasil','Data Berhasil Ditambah.');
        }

        return redirect()->route('pembayaran.index');
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
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index');
    }
}
