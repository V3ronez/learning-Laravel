<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; //corrige o nome da table que por padrao tem apenas o 's' inserido;
    protected $fillable = ['name', 'site', 'uf', 'email']; //autoriza o uso do ::create no tinker;


}
