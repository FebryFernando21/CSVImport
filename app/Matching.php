<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
     public $fillable = ['tgl', 'keterangan', 'cabang', 'jumlah', 'saldo'];
}
