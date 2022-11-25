<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>User::inRandomOrder()->first()->id,
            'titulo' => $this->faker->sentence(),
            'categoria' =>  $this->faker->randomElement(['Ambiente', 'Universo', 'Educación', 'Sustentable', 'Tecnológico', 'Energía', 'Salud', 'Sociedad']),
            'descripcion' => $this->faker->paragraph(),
            'abstracto' => $this->faker->sentence(),
            'fecha' =>$this->faker->date('Y_m_d')
        ];
    }
}
