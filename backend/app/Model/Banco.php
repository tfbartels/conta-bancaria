<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    
    public function agencias()
    {
        return $this->hasMany('App\Model\Agencia');
    }
}
