<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $table = 'certificados';
    protected $fillable = ['orden', 'fecha', 'desde', 'hasta', 'nombre_comerciante', 'nombre_comercio', 'rubro', 'direccion', 'observaciones', 'previa', 'usuarios', 'telefono_contacto', 'correo_contacto'];
}
