<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkuanPelajar extends Model
{
    public function akuans()
    {
        return $this->belongsTo(MohonData::class, 'permohonan_id', 'id');
    }
}
