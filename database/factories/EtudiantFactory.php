<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userFactory = new UserFactory;
        return [
            'nom' => $this->faker->name, //Generates a fake name
            'adresse' => $this->faker->address, //generates a fake address
            'telephone' => $this->faker->phoneNumber, //generates a fake phone number
            'date_de_naissance' => $this->faker->dateTimeBetween('1900-01-01', '2020-12-31')->format('Y/m/d'), //generates a fake date of birth
            'ville_id' => Ville::inRandomOrder()->first(), //Generates a city from factory and extracts the city id
            'user_id' => $userFactory->create()->id
        ];
    }
}
