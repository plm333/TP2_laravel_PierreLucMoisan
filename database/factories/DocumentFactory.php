<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $extensions = array('pdf', 'zip', 'doc');
        $finalExtension = $extensions[array_rand($extensions,1)];

        return [
            'nom' => $this->faker->text($maxNbChars = 10).$finalExtension,
            'nom_fr' => $this->faker->text($maxNbChars = 10).$finalExtension,
            'date' => $this->faker->date(),
            'path' => 'uploads/test.pdf',
            'user_id' => User::all()->random()->id
        ];
    }
}
