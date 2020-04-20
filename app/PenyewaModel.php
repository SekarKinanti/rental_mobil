<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyewaModel extends Model
{
    protected $table="penyewa";
    protected $primarykey="id_penyewa";
    public $timestamps=false;

    protected $fillable = [
        'nama_penyewa',
        'alamat',
        'telp'

    ];
}
