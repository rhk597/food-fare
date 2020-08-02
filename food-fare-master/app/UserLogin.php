<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $fillable = [
        'srno', 'password', 'sec_answer', 'security_status', 'user_pass', 'sec_id','address','contact','email','user_id'
    ];
}