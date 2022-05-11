<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratBalasan extends Model
{
    public function suratbalas()
    {
        return $this->belongsTo(MohonData::class,'permohonan_id','id');
    }
}
