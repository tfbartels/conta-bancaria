<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    
    public function agencia()
    {
        return $this->belongsTo('App\Model\Agencia');
    }
}
