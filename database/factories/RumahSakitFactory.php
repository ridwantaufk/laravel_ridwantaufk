<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RumahSakitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company . ' Hospital',
            'alamat' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'telepon' => '08' . $this->faker->randomNumber(9, true),
        ];
    }
}
