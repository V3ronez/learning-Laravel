<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        return $this->belongsToMany('\App\Models\Produto', 'pedidos_produtos')->withPivot('id', 'created_at');
        //UM PRODUTO PERTERNCE A VARIOS PEDIDOS ATRAVES DA TABELA 'pedidos_produtos'; relacao N para N;

        //em caso de despadronização;
        // return $this->belongsToMany('\App\Models\Item', 'pedidos_produtos', 'pedido_id(FK table mapeada por esse model)', 'produto_id(outra FK do relacionamento)');
    }
}
