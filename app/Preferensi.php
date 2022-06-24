<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
    protected $table = 'preferensi';
    protected $fillable = ['ranking','alternatif', 'preferensi','updated_at', 'created_at'];
}
