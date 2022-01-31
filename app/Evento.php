<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id', 'name', 'created_by','fecha','begin','end','description','isActive'
    ];
}
