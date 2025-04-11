<?php

namespace Database\Factories;

use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->phoneNumber(), // GANTI INI
            'rumah_sakit_id' => RumahSakit::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
