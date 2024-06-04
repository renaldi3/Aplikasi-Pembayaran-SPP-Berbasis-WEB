<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index',['petugas'=>$petugas]);
    }

    
    public function create()
    {
        $petugas = Petugas::all();
        return View('petugas.create',['petugas'=>$petugas]);
    }

  
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'username'    => 'required|max:25|unique:petugas',
            'password'    => 'required|min:3',            
            'nama_petugas'    => 'required|max:25',            
            'level'    => 'required',            
        ]);
        $validasi['password'] = Hash::make($request->password);
        $petugas = Petugas::create($validasi);
        
        
        if ($petugas) {
            alert()->success('Berhasil','Data Berhasil Ditambah.');
        }

        return redirect()->route('petugas.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $petugas = Petugas::all();
        $petugas = Petugas::find($id);
        return view('petugas.edit',['petugas'=>$petugas]);
    }

   
    public function update(Request $request, petugas $petugas)
    {
        if ($request->password){
        $validasi = $request->validate([
            'username'        => 'required|max:25',           
            'password'        => 'required|min:3',            
            'nama_petugas'    => 'required|max:25',            
            'level'           => 'required',            
        ]);
        $validasi['password'] = Hash::make($request->password);
        $petugas = Petugas::where('id',$petugas->id)->update($validasi);
        }
        //jika password tidak dirubah
        else{
            $validasi = $request->validate([
                'username'        => 'required|max:25',                      
                'nama_petugas'    => 'required|max:25',            
                'level'           => 'required',            
            ]);    
            $petugas = Petugas::where('id',$petugas->id)->update($validasi); 
            $validasi['password'] = Hash::make($request->password);
        }
        if ($validasi) {
            alert()->success('Berhasil','Data Berhasil Diperbarui.');
        }
        return redirect()->route('petugas.index');
    }

    
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}
