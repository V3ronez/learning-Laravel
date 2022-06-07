<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => ['nome' => 'fornecedor 1', 'status' => 'N', 'cnpj' => '00.000.000/000-00'],
            1 => ['nome' => 'fornecedor 2', 'status' => 'S', 'cnpj' => ''],
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
