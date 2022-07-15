<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; //corrige o nome da table que por padrao tem apenas o 's' inserido;
    protected $fillable = ['nome', 'site', 'uf', 'email']; //autoriza o uso do ::create no tinker;

    public function produtos()
    {
        //por padrao não precisa especificar.
        // return $this->hasMany('\App\Models\Produto', 'fornecedor_id', 'id');
        return $this->hasMany('\App\Models\Produto');
    }

}
