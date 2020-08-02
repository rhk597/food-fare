<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    protected $fillable = [
        'id', 'user_id','event_id'
    ];
    public function eventData(){
        return $this->hasOne(Event::class,'id','event_id');
    }
    public function userData(){
        return $this->hasOne(User::class,'srno','user_id');
    }
}
