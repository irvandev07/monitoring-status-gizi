<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpb extends Model
{
     protected $table = 'bpb_posyandu';
     protected $fillable = ['id', 'posyandu','alamat','created_at','updated_at'];
}
