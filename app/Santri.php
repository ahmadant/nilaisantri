<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable=[
        'nama','alamat','nis','foto'
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class,'id_santri');
    }

}
