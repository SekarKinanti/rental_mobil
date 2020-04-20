<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_mobilModel extends Model
{
    protected $table="data_mobil";
    protected $primarykey="id_data";
    public $timestamps=false;

    protected $fillable = [
        'id_jenis',
        'nama_mobil',
        'merk',
        'plat',
        'kondisi'

    ];
}
