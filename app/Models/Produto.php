<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'peso', 'unidade_id', 'descricao', 'fornecedor_id'];

    public function produtoDetalhe()
    {

        return $this->hasOne('\App\Models\ProdutoDetalhe');

        //Produto tem 1 produtoDetalhe
        //1 registro esta relacionado em produto_detalhes atraves de produto_id (fk);
    }
    public function fornecedor()
    {
        return $this->belongsTo('\App\Models\Fornecedor');
    }
    public function pedidos()
    {
        return $this->belongsToMany('\App\Models\Pedido', 'pedidos_produtos');
    }

}
