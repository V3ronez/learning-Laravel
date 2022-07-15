<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'comprimento', 'altura', 'unidade_id', 'largura'];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
