<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afiliado extends Model
{
    // use SoftDeletes; //Implementamos borrado logico
    // protected $dates = ['deleted_at']; //Registramos la nueva columna
   

    protected $table = 'afiliado';
    // protected $primaryKey = 'nro_doc';
}
