<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenBerkaitan extends Model
{
    public function mohondokumens()
    {
        return $this->belongsTo(MohonData::class, 'permohonan_id', 'id');
    }
}
