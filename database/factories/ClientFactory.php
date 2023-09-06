<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Equipe;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $abonnement = ['Mensuel', 'Trimestriel', 'Semestriel', 'Annuel'];
        $paiement = ['Virement', 'Espèces'];
        $status = ['Payé', 'En attente de paiement', 'Non Payé', 'En période de teste'];
        $equipeId = Equipe::inRandomOrder()->first()->id ?? Equipe::factory()->create()->id;

        return [
            'equipe_id' => $equipeId,
            'nom' => fake()->name(),
            'adresse' => fake()->address(),
            'email' => fake()->freeEmail(),
            'telephone' => fake()->phoneNumber(),
            'prix' => fake()->numberBetween(300, 6000),
            'abonnement' => function () {
                $randomNumber = fake()->numberBetween(1, 100);
            
                if ($randomNumber <= 60) {
                    return 'Mensuel'; // 40% d'annuel
                } elseif ($randomNumber <= 20) {
                    return 'Trimestriel'; // 30% de trimestriel
                } elseif ($randomNumber <= 10) {
                    return 'Annuel'; // 30% de trimestriel
                } else {
                    return 'Semestriel'; // 30% de semestriel
                }
            },
            'status' => fake()->randomElement($status),
            'paiement' => fake()->randomElement($paiement)
        ];
    }
}
