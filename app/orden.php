<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    
    

    public function nomenclatu()
    {
        return $this->belongsTo(nomenclatura::class);
    }

    public function copago()
    {
        return $this->belongsTo(Copago::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function afiliados()
    {
        return $this->belongsTo(Afiliado::class, 'nro_doc');
    }

    public function medio_pago()
    {
        return $this->belongsTo(MedioPago::class, 'medio_pagos_id');
    }

    public function tipo_practica()
    {
        return $this->belongsTo(Tipoorden::class, 'tipo_orden');
    }

    

    

    

    
}
