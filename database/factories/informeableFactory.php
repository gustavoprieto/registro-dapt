<?php

namespace Database\Factories;

use App\Models\Estado;
use App\Models\TipoEquipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\informeable>
 */
class informeableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'estado_id' => Estado::all()->random()->id,
            'status'=>1,
        ];
    }
}