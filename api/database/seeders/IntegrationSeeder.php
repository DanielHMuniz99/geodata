<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Integration;

class IntegrationSeeder extends Seeder
{
    public function run(): void
    {
        Integration::updateOrCreate(['name' => 'API_CURRENCY_FREAKS'], [
            'value' => ''
        ]);

        Integration::updateOrCreate(['name' => 'RAPID_API'], [
            'value' => ''
        ]);
    }
}
