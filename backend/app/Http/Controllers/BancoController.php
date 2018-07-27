<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Banco;

class BancoController extends Controller
{
    public function getAllAgencias($id)
    {
        $banco = Banco::find($id);
        return $banco->agencias->toJson();
    }
}
