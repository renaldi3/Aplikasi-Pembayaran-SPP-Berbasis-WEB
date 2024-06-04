<?php

namespace App\Http\Controllers;
use App\Models\Spp;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SppController extends Controller
{
    
    public function index()
    {
        $spp = Spp::all();
        return view('spp.index',['spp'=>$spp]);
    }

    
    public function create()
    {
        $spp = Spp::all();
        return View('spp.create',['spp'=>$spp]);
    }

    
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tahun'    => 'required|max:4|unique:spp',
            'nominal'    => 'required'            
        ]);

        $spp = Spp::create($validasi);

        if ($spp){
            alert()->success('Berhasil','Data Berhasil Ditambah.');
        }

        return redirect()->route('spp.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $spp = Spp::find($id);
        return view('spp.edit',['spp'=>$spp]);
    }

   
    public function update(Request $request, spp $spp)
    {
        $validasi = $request->validate([
            'tahun'    => 'required|max:4',
            'nominal'    => 'required',
        ]);
        $spp = Spp::where('id',$spp->id)->update($validasi);
        if ($spp){
            alert()->success('Berhasil','Data Berhasil Diperbarui.');
        }
        return redirect()->route('spp.index');
    }

   
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();
        return redirect()->route('spp.index');
    }
}
