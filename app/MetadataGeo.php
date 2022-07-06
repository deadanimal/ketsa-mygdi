<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetadataGeo extends Model
{
    protected $connection = 'pgsql2';
    protected $guard_name = 'web';
    public $table = 'metadata';
    public $timestamps = false;
    
    public function pengesahDetail(){
        return $this->hasOne('App\User', 'id', 'pengesah');
    }
    
    public function penerbitDetail(){
        return $this->setConnection('pgsql')->hasOne('App\User', 'id', 'portal_user_id');
    }
}
