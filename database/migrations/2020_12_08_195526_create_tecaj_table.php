<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecajTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecaj', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('Naziv', 100);
            $table->text('Opis');
            $table->integer('Vrijeme');
            $table->enum('Razina',['Početnička', 'Srednja', 'Napredna']);
            $table->unsignedBigInteger('Kategorije_id');
            $table->unsignedBigInteger('Kreator_id');
            $table->timestamps();

            $table->foreign('Kategorije_id')->references('id')->on('kategorije');
            $table->foreign('Kreator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecaj');
    }
}
