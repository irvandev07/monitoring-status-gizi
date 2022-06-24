<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BpbController extends Controller
{
    public function index(Request $request)
    {
        $data_bpb = \App\Bpb::all();
        
        return view('bpb.index',['data_bpb' => $data_bpb]);
    }
    public function tambah(Request $request)
    {
        \App\Bpb::create($request->all());
        return redirect ('/bpb')->with('Sukses', 'Bpb Berhasil Di Input');
    }
    public function anak()
    {
        $bpb_anak = \App\Bpb_anak::all();
        return view('bpb.detail',['bpb_anak' => $bpb_anak]);
    }
    public function tambah_anak(Request $request)
    {
        $this->validate($request, [
            'anak_ke' => 'required',
            'tgl_lahir' => 'required',
            'kelamin' => 'required',
            'no_kk' => 'required',
            'nik_anak' => 'required',
            'nama_anak' => 'required|min:3',
            'bb_lahir' => 'required',
            'pb_lahir' => 'required',
            'buku_kia' => 'required',
            'imd' => 'required',
            'nama_ayah' => 'required|min:3',
            'nama_ibu' => 'required|min:3',
            'no_hp' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kampung' => 'required',
            'status_ekonomi' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'cara_ukur' => 'required',
            'vitamin' => 'required',
            'asi' => 'required',
            'bb_2' => 'required',
            'tb_2' => 'required',
            'cara_ukur2' => 'required',
            'vitamin_2' => 'required',
            'asi_2' => 'required',
            'pmt' => 'required',
            'keterangan' => 'min:1',

        ]);

        $bpb = new \App\Bpb_anak;
        $bpb->anak_ke = $request->input('anak_ke');
        $bpb->tgl_lahir = $request->input('tgl_lahir');
        $bpb->kelamin = $request->input('kelamin');
        $bpb->no_kk = $request->input('no_kk');
        $bpb->nik_anak = $request->input('nik_anak');
        $bpb->nama_anak = $request->input('nama_anak');
        $bpb->bb_lahir = $request->input('bb_lahir');
        $bpb->pb_lahir = $request->input('pb_lahir');
        $bpb->buku_kia = $request->input('buku_kia');
        $bpb->imd = $request->input('imd');
        $bpb->nama_ayah = $request->input('nama_ayah');
        $bpb->nama_ibu = $request->input('nama_ibu');
        $bpb->no_hp = $request->input('no_hp');
        $bpb->rt = $request->input('rt');
        $bpb->rw = $request->input('rw');
        $bpb->kampung = $request->input('kampung');
        $bpb->status_ekonomi = $request->input('status_ekonomi');
        $bpb->bb = $request->input('bb');
        $bpb->tb = $request->input('tb');
        $bpb->cara_ukur = $request->input('cara_ukur');
        $bpb->vitamin = $request->input('vitamin');
        $bpb->asi = $request->input('asi');
        $bpb->bb_2 = $request->input('bb_2');
        $bpb->tb_2 = $request->input('tb_2');
        $bpb->cara_ukur2 = $request->input('cara_ukur2');
        $bpb->vitamin_2 = $request->input('vitamin_2');
        $bpb->asi_2 = $request->input('asi_2');
        $bpb->pmt = $request->input('pmt');
        $bpb->keterangan = $request->input('keterangan');
        $bpb->save();

        return redirect ('/bpb/{posyandu}/detail')->with('Sukses', 'Data BPB Berhasil Di Input');
    }

    
}
