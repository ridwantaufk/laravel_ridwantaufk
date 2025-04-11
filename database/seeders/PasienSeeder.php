<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rsList = RumahSakit::all();
        foreach ($rsList as $rs) {
            Pasien::factory()->count(5)->create(['rumah_sakit_id' => $rs->id]);
        }
    }
}
