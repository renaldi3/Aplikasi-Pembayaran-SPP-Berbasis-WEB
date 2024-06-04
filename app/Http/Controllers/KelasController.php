<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class KelasController extends Controller
{
    
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index',['kelas'=>$kelas]);
    }

   
    public function create()
    {
        return view('kelas.create');
    }

   
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_kelas'    => 'required|max:10|unique:kelas',
            'kompetensi_keahlian'    => 'required|max:50'            
        ]);

        $kelas = Kelas::create($validasi);
        if ($kelas){
            alert()->success('Berhasil','Data Berhasil Ditambah.');
        }
       
        return redirect()->route('kelas.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $kelas = Kelas::all();
        $kelas = Kelas::find($id);
        return view('kelas.edit',['kelas'=>$kelas],['kelas'=>$kelas]);
    }

    
    public function update(Request $request, kelas $kelas)
    {
        $validasi = $request->validate([
            'nama_kelas'    => 'required|max:10',
            'kompetensi_keahlian'    => 'required|max:50',
        ]);
        $kelas = Kelas::where('id',$kelas->id)->update($validasi);
        if ($kelas){
            alert()->success('Berhasil','Data Berhasil Diperbarui.');
        }
       
        return redirect()->route('kelas.index');
    }

    
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
