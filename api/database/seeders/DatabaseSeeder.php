<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            CountryGdpSeeder::class,
            IncomeShareSeeder::class,
            CostOfLivingSeeder::class,
            IntegrationSeeder::class
        ]);
    }
}
