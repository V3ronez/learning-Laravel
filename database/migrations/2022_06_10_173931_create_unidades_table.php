<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);

            $table->timestamps();

        });
        //adicionando relacionamento com a table produtos;

        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        //unidade_id aponta para 'id' na table 'unidade'
        });

        //adicionadno relacionamento com a table produtos_detalhes;
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover o relacionamento das tables na ortem logica
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //remover a foreign
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // [table]_[coluna]_foreign;
            //remover a coluna unidade
            $table->dropColumn('unidade_id');

        }
        );


        Schema::table('produtos', function (Blueprint $table) {
            //remover a foreign
            $table->dropForeign('produtos_unidade_id_foreign'); // [table]_[coluna]_foreign;
            //remover a coluna unidade
            $table->dropColumn('unidade_id');

        }
        );

        Schema::dropIfExists('unidades');
    }
};
