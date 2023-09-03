<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hebergement>
 */
class HebergementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prixMensuel" => 0,
            "prixTrimestriel" => 0,
            "prixSemestriel" => 0,
            "prixAnnuel" => 0,
        ];
    }
}
