<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnero extends Model
{
    public function cat()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }
}
