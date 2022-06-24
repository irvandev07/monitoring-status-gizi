<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'data_anak';
    protected $fillable = ['posyandu','nama', 'kelamin', 'gizi','updated_at', 'created_at'];
}
