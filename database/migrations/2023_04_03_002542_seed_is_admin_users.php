<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class SeedIsAdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = User::create([
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d'),
            'password' => '$2y$10$E/tRlVEexbNkg6k.Hgy8K.EW53YZJlJn5AKRhD9lW84/7NuwZCotK',
            'is_admin' => 1
        ]);

        Etudiant::create([ 
            'nom' => 'Pierre',
            'adresse' => '456 rue Pitre',
            'telephone' => '514-887-8977',
            'date_de_naissance' => '2020-12-31',
            'ville_id' => 1,
            'user_id' => $user->id
        ]);
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
