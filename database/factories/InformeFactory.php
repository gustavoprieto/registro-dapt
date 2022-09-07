<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Estado;
use App\Models\Turno;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Doctrine\DateTimeType;
use Carbon\CarbonTimeZone;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informe>
 */
class InformeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fecha = $this->faker->date();
        // $fecha = $this->faker->dateTimesBetween(-58 , now());
        $usuario = User::all()->random()->id;
        $turno = Turno::all()->random()->id;
        return [
            'Fecha' => $fecha,
            'usuario_id' =>$usuario,
            'turno_id' => $turno,
            'comentario'=>'Este es el comentario del Informe  del usuario ' . $usuario . ' de fecha ' . $fecha 
            . ' en el turno ' . $turno, 
            'status' => 1,
            'numero' =>'121/2020'
        ];
    }
}