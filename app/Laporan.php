<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = ['id', 'laporan_bulan', 'tgl_penimbangan', 'petugas_lapangan', 'jumlah_kader', 'jumlah_kader_aktif', 's_5', 's_11', 's_23', 's_59', 's_total', 'k_5', 'k_11', 'k_23', 'k_59', 'k_total', 'n_5', 'n_11', 'n_23', 'n_59', 'n_total', 't_5', 't_11', 't_23', 't_59', 't_total', 'o_5', 'o_11', 'o_23', 'o_59', 'o_total', 'b_5', 'b_11', 'b_23', 'b_59', 'b_total', 'update_at', 'created_at'];
}
