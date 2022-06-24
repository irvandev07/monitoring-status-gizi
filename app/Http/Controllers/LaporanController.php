<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
     public function laporan(){
        $laporan = \App\Laporan::all();
        return view ('admin.laporan',['laporan' => $laporan]);
    }

    public function tambah(Request $request){
    	 $this->validate($request, [
    	 	'laporan_bulan' => 'required',
    	 	'tgl_penimbangan' => 'required',
    	 	'petugas_lapangan' => 'required',
    	 	'jumlah_kader' => 'required',
    	 	'jumlah_kader_aktif' => 'required',
    	 	's_5' => 'required',
    	 	's_11' => 'required',
    	 	's_23' => 'required',
    	 	's_59' => 'required',
    	 	's_total' => 'required',
    	 	'k_5' => 'required',
    	 	'k_11' => 'required',
    	 	'k_23' => 'required',
    	 	'k_59' => 'required',
    	 	'k_total' => 'required',
    	 	'n_5' => 'required',
    	 	'n_11' => 'required',
    	 	'n_23' => 'required',
    	 	'n_59' => 'required',
    	 	'n_total' => 'required',
    	 	't_5' => 'required',
    	 	't_11' => 'required',
    	 	't_23' => 'required',
    	 	't_59' => 'required',
    	 	't_total' => 'required',
    	 	'o_5' => 'required',
    	 	'o_11' => 'required',
    	 	'o_23' => 'required',
    	 	'o_59' => 'required',
    	 	'o_total' => 'required',
    	 	'b_5' => 'required',
    	 	'b_11' => 'required',
    	 	'b_23' => 'required',
    	 	'b_59' => 'required',
    	 	'b_total' => 'required',
    	 ]);

    	  $laporan = new \App\Laporan;
    	  $laporan->laporan_bulan = $request->input('laporan_bulan');
    	  $laporan->tgl_penimbangan = $request->input('tgl_penimbangan');
    	  $laporan->petugas_lapangan = $request->input('petugas_lapangan');
    	  $laporan->jumlah_kader = $request->input('jumlah_kader');
    	  $laporan->jumlah_kader_aktif = $request->input('jumlah_kader_aktif');
    	  $laporan->s_5 = $request->input('s_5');
    	  $laporan->s_11 = $request->input('s_11');
    	  $laporan->s_23 = $request->input('s_23');
    	  $laporan->s_59 = $request->input('s_59');
    	  $laporan->s_total = $request->input('s_total');
    	  $laporan->k_5 = $request->input('k_5');
    	  $laporan->k_11 = $request->input('k_11');
    	  $laporan->k_23 = $request->input('k_23');
    	  $laporan->k_59 = $request->input('k_59');
    	  $laporan->k_total = $request->input('k_total');
    	  $laporan->n_5 = $request->input('n_5');
    	  $laporan->n_11 = $request->input('n_11');
    	  $laporan->n_23 = $request->input('n_23');
    	  $laporan->n_59 = $request->input('n_59');
    	  $laporan->n_total = $request->input('n_total');
    	  $laporan->t_5 = $request->input('t_5');
    	  $laporan->t_11 = $request->input('t_11');
    	  $laporan->t_23 = $request->input('t_23');
    	  $laporan->t_59 = $request->input('t_59');
    	  $laporan->t_total = $request->input('t_total');
    	  $laporan->o_5 = $request->input('o_5');
    	  $laporan->o_11 = $request->input('o_11');
    	  $laporan->o_23 = $request->input('o_23');
    	  $laporan->o_59 = $request->input('o_59');
    	  $laporan->o_total = $request->input('o_total');
    	  $laporan->b_5 = $request->input('b_5');
    	  $laporan->b_11 = $request->input('b_11');
    	  $laporan->b_23 = $request->input('b_23');
    	  $laporan->b_59 = $request->input('b_59');
    	  $laporan->b_total = $request->input('b_total');
    	  $laporan->save();

          return redirect ('/laporan')->with('Sukses', 'Laporan Berhasil Di Input');
    }

     public function edit($id){
        $laporan = \App\Laporan::find($id);
        $laporan->update($request->all());
        return view('laporan/edit' , ['laporan' => $laporan]);
    }

     public function update(Request $request, $id)
    {
        $laporan = \App\Laporan::find($id);
        $laporan->update($request->all());
        return redirect('/laporan')->with('Sukses', 'Laporan Berhasil Di update');
    }

     public function hapus($id)
    {
        $laporan = \App\Laporan::find($id);
        $laporan->delete($laporan);
        return redirect('/laporan')->with('Sukses', 'Laporan Berhasil Di hapus');
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\LaporanImport,$request->file('laporan'));
        return redirect('/laporan')->with('Sukses', 'Laporan Berhasil Di Import');
        // dd($request->all());
    }
     public function exportexcel()
    {
        return Excel::download(new LaporanExport, 'Laporan_Bulanan.xlsx');
    }
    
}
