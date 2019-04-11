<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    
public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('empresa_id')->unsigned()->nullable();;
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->integer('destino_id')->unsigned();
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->decimal('valor', 12, 2 )->nullable();
            $table->date('data')->nullable();
            $table->text('situacao')->nullable();
            $table->string('arquivo');
            $table->string('pdf');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
    {
        //
    }
}
