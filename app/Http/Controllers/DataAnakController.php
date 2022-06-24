<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnakExport;


class DataAnakController extends Controller
{

    public function anak()
    {
        $data_anak = \App\Anak::all();
        $data_wilayah = \App\Wilayah::all();
        return view('wilayah.Detail',['data_anak' => $data_anak],['data_wilayah' => $data_wilayah]);
    }
    public function tambah(Request $request){

        $validator = Validator::make($request->all(),[
            'posyandu' => 'required',
            'nama' => 'min:3',
            'kelamin' => 'required',
            'gizi' => 'required',
        
        ]);
        if ($validator->fails()) {
            return redirect ('/wilayah/{posyandu}/detail')->with('Alert', 'Data Anak Gagal Di Input !');
        }else{
            $Anak = new \App\Anak;
            $Anak->posyandu = $request->input('posyandu');
            $Anak->nama = $request->input('nama');
            $Anak->kelamin = $request->input('kelamin');
            $Anak->gizi = $request->input('gizi');
            $Anak->save();
        }
        
        return redirect ('/wilayah/{posyandu}/detail')->with('Sukses', 'Data Anak Berhasil Di Input');
    }
    public function exportexcel()
    {
        return Excel::download(new AnakExport, 'Data-anak.xlsx');
    }
    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\AnakImport,$request->file('data_anak'));
        return redirect('/wilayah/{posyandu}/detail')->with('Sukses', 'Data Anak Berhasil Di Import');
        // dd($request->all());
    }
    public function update(Request $request, $id)
    {
        $Anak = \App\Anak::find($id);
        $Anak->update($request->all());
        return redirect('/wilayah/{posyandu}/detail')->with('Sukses', 'Anak Berhasil Di update');
    }
    public function hapus($id)
    {
        $Anak = \App\Anak::find($id);
        //dd($Anak);
        $Anak->delete($Anak);
        return redirect('/wilayah/{posyandu}/detail')->with('Sukses', 'Anak Berhasil Di hapus');
    }
}
