<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    public function penilaians()
    {
        return $this->belongsTo(MohonData::class, 'permohonan_id', 'id');
    }
}
