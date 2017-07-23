<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','card_type','billingAddress',
        'socialSecurityNo','cvv_no','dob','exp','matrial_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function AppShare(){
      return $this->hasMany('App\AppShare');
    }
    public function TeamShare(){
      return $this->hasMany('App\TeamShare');
    }
}
