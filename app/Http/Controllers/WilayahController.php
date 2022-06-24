<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class WilayahController extends Controller
{

    public function index(Request $request)
    {
        $data_wilayah = \App\Wilayah::all();
        
        return view('wilayah.index',['data_wilayah' => $data_wilayah]);
    }
    public function tambah(Request $request)
    {
       // \App\Wilayah::create($request->all());
       $validator = Validator::make($request->all(),[
            'alternatif' => 'required',
            'posyandu' => 'min:3',
            'alamat' => 'required',
    
        ]); 
        if ($validator->fails()) {
            return redirect ('/wilayah')->with('Alert', 'Wilayah Gagal Di Input !');
        }else{
            $wilayah = new \App\Wilayah;
            $wilayah->alternatif = $request->input('alternatif');
            $wilayah->posyandu = $request->input('posyandu');
            $wilayah->alamat = $request->input('alamat');
            $wilayah->save();
        }
        return redirect ('/wilayah')->with('Sukses', 'Wilayah Berhasil Di Input');
    }
    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\WilayahImport,$request->file('data_wilayah'));
        return redirect('/wilayah')->with('Sukses', 'Data Wilayah Berhasil Di Import');
        //dd($request->all());
    }

}
