<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';
    protected $fillable = ['id_alternatif', 'nama', 'updated_at', 'created_at'];
}
