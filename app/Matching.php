<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    protected $fillable = ['id_csv', 'tanggal', 'keterangan', 'cabang', 'jumlah', 'saldo'];

    const CREATED_AT = 'createddate';
    const UPDATED_AT = 'modifieddate';
}
