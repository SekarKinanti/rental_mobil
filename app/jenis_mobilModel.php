<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_mobilModel extends Model
{
    protected $table="jenis_mobil";
    protected $primarykey="id_jenis";
    public $timestamps=false;

    protected $fillable = [
        'nama_jenis'

    ];
}
