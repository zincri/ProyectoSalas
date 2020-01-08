<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora_inicio',
        'hora_final',
        'proyector',
        'estado',
        'activo',
        'sala_id',
        'usuario_id',
        'status_id',
        'proyector_id',
    ];

    public function sala(){
    return $this->belongsTo('App\Sala', 'sala_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'usuario_id');
        }

    public function projector(){
        return $this->belongsTo('App\Projector', 'projector_id');
        }
    
    public function state(){
        return $this->belongsTo('App\Status', 'status_id');
        }

    public function gallery(){
        return $this->hasMany('App\Gallery','evento_id','id');
    }    
    
}
