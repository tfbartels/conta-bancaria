<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    
    public function contas()
    {
        return $this->hasMany('App\Model\Conta');
    }

    public function banco()
    {
        return $this->belongsTo('App\Model\Banco');
    }
}
