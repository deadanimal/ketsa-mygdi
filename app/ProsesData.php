<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesData extends Model
{
    public function proses_datas()
    {
        return $this->belongsTo(MohonData::class,'permohonan_id','id');
    }
}
