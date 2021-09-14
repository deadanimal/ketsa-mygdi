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

    public function mohondokumens(){
        return $this->hasMany(DokumenBerkaitan::class,'permohonan_id','id');
    }

    public function penilaians(){
        return $this->hasOne(Penilaian::class,'permohonan_id','id');
    }

    public function akuans(){
        return $this->hasOne(MohonData::class,'permohonan_id','id');
    }

    public function proses_datas(){
        return $this->hasOne(ProsesData::class,'permohonan_id','id');
    }

    public function suratbalas()
    {
        return $this->hasOne(SuratBalasan::class,'permohonan_id','id');
    }

    public function mohonSenaraiKawasan()
    {
        return $this->hasOne(SenaraiKawasanData::class,'permohonan_id','id');
    }

}
