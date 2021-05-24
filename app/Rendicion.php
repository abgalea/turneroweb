<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendicion extends Model
{
    protected $table = 'rendicion';

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
