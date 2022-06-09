<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => ['nome' => 'fornecedor 1', 'status' => 'N', 'cnpj' => '00.000.000/0000-00'],
            1 => ['nome' => 'fornecedor 2', 'status' => 'S', 'cnpj' => '12.053.561/0001-38'],
            2 => ['nome' => 'fornecedor 3', 'status' => 'N', 'cnpj' => '47.429.579/0001-76'],
            3 => ['nome' => 'fornecedor 4', 'status' => 'S', 'cnpj' => '35.363.771/0001-28'],
            4 => ['nome' => 'fornecedor 5', 'status' => 'S', 'cnpj' => '03.427.660/0001-41'],
        ];

        // echo isset($fornecedores[0]['cnpj']) ? 'Fornecedor tem CNPJ' : 'Fornecedor não tem CNPJ';

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
