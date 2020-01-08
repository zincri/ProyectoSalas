<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event', 'projector_id','id');
    }
}
