<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{

    protected $fillable=[
        'id_santri','id_kategori','keterangan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class,'id_santri');
    }
    public function kategori()
    {
       return $this->belongsTo(Kategori::class,'id_kategori');
    }
}
