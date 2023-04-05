<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->word(),
            'titre_fr' => $this->faker->word(),
            'texte' => $this->faker->text($maxNbChars = 1500),
            'texte_fr' => $this->faker->text($maxNbChars = 1500),
            'date' => $this->faker->date(),
            'user_id' => User::all()->random()->id
        ];
    }
}
