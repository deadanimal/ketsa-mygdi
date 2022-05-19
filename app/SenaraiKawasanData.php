<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SenaraiKawasanData extends Model
{

    protected $guarded = ['id'];

    public function mohonSenaraiKawasan()
    {
        return $this->belongsTo(MohonData::class, 'permohonan_id', 'id');
    }
}
