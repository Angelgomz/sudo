<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id', 
        'id_google',
        'nombre',
        'tipo_evento',
        'eTag',
        'description',
        'update_google',
        'created_by',
        'email_creator',
        'fecha',
        'begin',
        'end',
        'created_por',
        'status',
        'isActive'
    ];
}
