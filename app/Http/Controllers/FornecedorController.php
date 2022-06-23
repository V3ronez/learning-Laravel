<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor');
    }
}
