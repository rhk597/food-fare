<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'srno', 'firstname', 'email','lastname', 'city', 'state', 'company','password','security_status', 'sec_answer','sec_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function question(){
        return $this->hasOne(SecurityQuestion::class,'srno','sec_id');
    }
}
