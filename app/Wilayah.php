<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah_posyandu';
    protected $fillable = ['alternatif','posyandu', 'alamat', 'updated_at', 'created_at'];
}
