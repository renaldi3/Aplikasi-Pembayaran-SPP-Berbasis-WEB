<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
   
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index',['siswa'=>$siswa]);
    }

    
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create',['kelas'=>$kelas],['spp'=>$spp]);
    }

   
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nisn'    => 'required|max:10|unique:siswas',
            'nis'    => 'required|max:8|unique:siswas',            
            'nama'    => 'required',           
            'password'    => 'required|min:3',           
            'kelas_id'    => 'required',            
            'alamat'    => 'required',            
            'no_telp'    => 'required|max:13',            
            'spp_id'    => 'required',            
        ]);
        $validasi['password'] = Hash::make($request->password);
        $siswa = Siswa::create($validasi);

        if ($siswa) {
            alert()->success('Berhasil','Data Berhasil Ditambah.');
        }

        return redirect()->route('siswa.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.edit',['siswa'=>$siswa],['spp'=>$spp,'kelas'=>$kelas],);
    }

   
    public function update(Request $request, siswa $siswa)
    {
        if ($request->password){
           $validasi = $request->validate([
            'nisn'    => 'required|max:10',         
            'nama'    => 'required',                        
            'password'    => 'required',                        
            'kelas_id'    => 'required',            
            'alamat'    => 'required',            
            'no_telp'    => 'required|max:13',            
            'spp_id'    => 'required', 
        ]);
        $validasi['password'] = Hash::make($request->password);
        $siswa = Siswa::where('id',$siswa->id)->update($validasi);  
        }
         //jika password tidak dirubah
        else{ 
            $validasi = $request->validate([
                'nisn'    => 'required|max:10',         
                'nama'    => 'required',                                             
                'kelas_id'    => 'required',            
                'alamat'    => 'required',            
                'no_telp'    => 'required|max:13',            
                'spp_id'    => 'required', 
            ]);
            
            $siswa = Siswa::where('id',$siswa->id)->update($validasi);
            $validasi['password'] = Hash::make($request->password);  
        }
        if ($validasi) {
            alert()->success('Berhasil','Data Berhasil Diperbarui.');
        }
        return redirect()->route('siswa.index');
    }

    
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
