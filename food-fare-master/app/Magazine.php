<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'id', 'title', 'magazines_path', 'desc','date'
    ];
}
