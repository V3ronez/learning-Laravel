<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instancia

        $fornecedor = new Fornecedor();
        $fornecedor->name = 'Antonio';
        $fornecedor->site = 'antonioForn.com.br';
        $fornecedor->uf = 'GO';
        $fornecedor->email = 'contato@antonio.com.br';
        $fornecedor->save();

        //tomar cuidado com o fillable da class;
        Fornecedor::create([
            'name' => 'Marcos',
            'site' => 'marcosForn.com.br',
            'uf' =>'RS',
            'email' => 'marcos@gmail.com'
        ]);
    }
}
