<?php
namespace App;

use App\Notifications\ResetPasswordNotification; // At the top under your namespace
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','nric','agensi_organisasi','bahagian','sektor','phone_pejabat','surat_sokongan','alamat','status','disahkan','institusi','kategori','assigned_roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_roles(){
        // return $this->belongsTo(Role::class, 'peranan', 'id');
    }

    public function users(){
        return $this->hasMany(MohonData::class,'user_id','id');
    }
    
    public function agensiOrganisasi(){
        return $this->hasOne('App\AgensiOrganisasi', 'id', 'agensi_organisasi');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->users()->delete();
             // do the rest of the cleanup...
        });
    }
    
    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPasswordNotification($token));
    }
}
