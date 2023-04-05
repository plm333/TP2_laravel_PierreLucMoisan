<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

            // $table->id();
            // $table->increments('id');
            // $table->string('nom', 50);
            // $table->text('adresse', 100);
            // $table->string('telephone', 20);
            // $table->string('courriel', 100);
            // $table->date('date_de_naissance');
            // $table->integer('ville_id')->unsigned();
            // $table->foreign('ville_id')->references('id')->on('villes');
            // $table->timestamps();



            // $table->id();
            // $table->increments('id');
            // $table->string('nom', 50);
            // $table->timestamps();
