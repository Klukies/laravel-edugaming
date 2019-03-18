<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property mixed email
 * @property mixed name
 * @property string password
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
    * These are the JWT methods requierd to use JWTAuth
    */
    public function getJWTIdentifier() {
      return $this->getKey();
    }

    public function getJWTCustomClaims() {
      return [];
    }

    public function review() {
        return $this->hasMany(Review::class);
    }

    public function reservation() {
        return $this->hasMany(Reservation::class);
    }
}
