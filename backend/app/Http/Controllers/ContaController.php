<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Conta;

class ContaController extends Controller
{
    public function getAllContas()
    {        
        return Conta::all()->toJson();
    }
}
