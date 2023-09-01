<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equipe;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Historique>
 */
class HistoriqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $equipeId = Equipe::inRandomOrder()->first()->id ?? Equipe::factory()->create()->id;
        $userID = User::inRandomOrder()->first()->id ?? User::factory()->create()->id;
        $clientID = Client::inRandomOrder()->first()->id ?? Client::factory()->create()->id;
        return [
            'equipe_id' => $equipeId,
            'user_id' => $userID,
            'client_id' => $clientID,
        ];
    }
}
