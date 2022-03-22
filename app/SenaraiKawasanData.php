<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SenaraiKawasanData extends Model
{
    public function mohonSenaraiKawasan()
    {
        return $this->belongsTo(MohonData::class, 'permohonan_id', 'id');
    }
}
