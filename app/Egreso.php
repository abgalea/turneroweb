<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    //
    public function tipomov()
    {
        return $this->belongsTo(Tipomovimiento::class, 'tipo_mov_id');
    }

    public function tipocomp()
    {
        return $this->belongsTo(Tipocomprobante::class, 'tipo_comprobante_id');
    }

    public function nomusu()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
