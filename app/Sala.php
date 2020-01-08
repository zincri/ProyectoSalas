<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    public function events(){
        return $this->hasMany('App\Event', 'sala_id','id');
        }
}
