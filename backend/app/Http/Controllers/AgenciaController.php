<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Agencia;

class AgenciaController extends Controller
{
    //Example Eager loading
    public function getAgencia($id)
    {
        $agencia = Agencia::with('banco')->with('contas')->find($id);
        return $agencia->toJson();
    }
    
    //Example Lazy loading
    public function getAllContas($id)
    {
        $agencia = Agencia::find($id);
        return $agencia->contas->toJson();
    }
}
