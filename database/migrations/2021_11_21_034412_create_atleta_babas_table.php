<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletaBabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atleta_babas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atleta_id');
            $table->foreign('atleta_id')->references('id')->on('atletas');
            $table->unsignedBigInteger('baba_id');
            $table->foreign('baba_id')->references('id')->on('babas');
            $table->integer('gols');
            $table->integer('falhas');
            $table->integer('assistecias');
            $table->boolean('is_veceu_baba')->default(false);
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
        Schema::dropIfExists('atleta_babas');
    }
}
