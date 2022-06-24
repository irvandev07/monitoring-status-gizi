<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Exports\KriteriaExport;
use App\Alternatif;
use App\Wilayah;




class FaktorController extends Controller
{
    public function kriteria(Request $request)
    {
        $data_kriteria = \App\Data::all();
        $data_wilayah = \App\Wilayah::all();
        return view('faktor.kriteria',['data_kriteria' => $data_kriteria],['data_wilayah' => $data_wilayah]);
    }
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'alternatif' => 'required',
            'nama' => 'min:3',
            'makan' => 'required',
            'infeksi' => 'required',
            'sanitasi' => 'required',
            'asuh' => 'required',
            'pangan' => 'required',
            'miskin' => 'required',
            'pendidikan' => 'required',
        ]); 
        if ($validator->fails()) {
            return redirect ('/kriteria')->with('Alert', 'Kriteria Gagal Di Input !');
        }else{
            
            $kriteria = new \App\Data;
            $kriteria->alternatif = $request->input('alternatif');
            $kriteria->nama = $request->input('nama');
            $kriteria->makan = $request->input('makan');
            $kriteria->infeksi = $request->input('infeksi');
            $kriteria->sanitasi = $request->input('sanitasi');
            $kriteria->asuh = $request->input('asuh');
            $kriteria->pangan = $request->input('pangan');
            $kriteria->miskin = $request->input('miskin');
            $kriteria->pendidikan = $request->input('pendidikan');
            $kriteria->save();
            
        }
        return redirect ('/kriteria')->with('Sukses', 'Kriteria Berhasil Di Input');
    
    }

    public function update(Request $request, $id)
    {
        $kriteria = \App\Data::find($id);
        $kriteria->update($request->all());
        
        return redirect('/kriteria')->with('Sukses', 'Kriteria Berhasil Di update');
    }
    public function hapus($id)
    {
        $kriteria = \App\Data::find($id);
        $kriteria->delete($kriteria);
        return redirect('/kriteria')->with('Sukses', 'Kriteria Berhasil Di hapus');
    }
    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\KriteriaImport,$request->file('data_kriteria'));
        return redirect('/kriteria')->with('Sukses', 'Data Kriteria Berhasil Di Import');
        // dd($request->all());
    }
    public function exportexcel()
    {
        return Excel::download(new KriteriaExport, 'Data_riteria.xlsx');
    }

    public function findAlternatif(Request $request)
    {
        $p= Wilayah::select('posyandu')->where('id',$request->id)->first();
		
    	return response()->json($p);

    }

    public function nilaimatriks(Request $request)
    {
        $data_kriteria = \App\Data::all();
        $data_wilayah = \App\Wilayah::all();
        return view('faktor.nilaimatriks',['data_kriteria' => $data_kriteria],['data_wilayah' => $data_wilayah]);
    }
    
}


