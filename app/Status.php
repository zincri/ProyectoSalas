<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event', 'status_id','id');
    }
}
