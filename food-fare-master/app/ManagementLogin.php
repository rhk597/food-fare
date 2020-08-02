<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagementLogin extends Model
{
    protected $fillable = [
        'srno', 'password', 'sec_answer', 'security_status', 'm_id', 'sec_id'
    ];
}
