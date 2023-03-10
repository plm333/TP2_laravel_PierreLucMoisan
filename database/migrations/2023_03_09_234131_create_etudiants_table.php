<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->string('nom', 50);
            $table->text('adresse', 100);
            $table->string('telephone', 20);
            $table->string('courriel', 100);
            $table->date('date_de_naissance');
            $table->integer('ville_id')->foreign()->references('id')->on('villes');
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
        Schema::dropIfExists('etudiants');
    }
}
