<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MohonData extends Model
{

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mohondatas(){
        return $this->hasMany(MohonData::class,'permohonan_id','id');
    }

    public function mohondokumens(){
        return $this->hasMany(MohonData::class,'permohonan_id','id');
    }

    public function penilaians(){
        return $this->hasOne(MohonData::class,'permohonan_id','id');
    }

    public function akuans(){
        return $this->hasOne(MohonData::class,'permohonan_id','id');
    }

    public function proses_datas(){
        return $this->hasOne(MohonData::class,'permohonan_id','id');
    }

    public function suratbalas()
    {
        return $this->hasOne(MohonData::class,'permohonan_id','id');
    }

}
