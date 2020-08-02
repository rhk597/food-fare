<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'srno', 'firstname', 'email', 'lastname','password', 'sec_answer', 'security_status','sec_id'
    ];
}
