<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medico';
    public $timestamps = false;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'sexo',
        'direccion',
        'telefono'
    ];
}
