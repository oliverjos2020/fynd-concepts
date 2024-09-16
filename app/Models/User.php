<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'role'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function need(){
        return $this->belongsTo(Need::class);
    }
    public function payslip(){
        return $this->belongsTo(Payslip::class);
    }
    public function biometric(){
        return $this->belongsTo(Biometric::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function otherdoc(){
        return $this->belongsTo(OtherDoc::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role): bool
    {
        return $this->role_id === $role;
    }
}
