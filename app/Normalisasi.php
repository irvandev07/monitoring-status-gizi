<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    protected $table = 'normalisasi';
    protected $fillable = ['posyandu','makan', 'infeksi','sanitasi', 'asuh', 'pangan', 'miskin', 'pendidikan', 'created_at', 'updated_at'];
}
