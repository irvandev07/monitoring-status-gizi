<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $fillable = ['alternatif','nama', 'makan', 'infeksi', 'sanitasi', 'asuh', 'pangan', 'miskin', 'pendidikan', 'updated_at', 'created_at'];
}
