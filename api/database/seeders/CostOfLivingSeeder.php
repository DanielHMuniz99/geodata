<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CostOfLivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/cost_of_living.json'));
        $countries = json_decode($json, true);

        foreach ($countries as $data) {

            $country = DB::table('countries')->where('code', $data["code"])->first();

            DB::table('cost_of_living')->insert([
                "country_id" => $country->id,
                "year" => $data["year"],
                "cost_living_index" => $data["cost_living_index"],
                "rent_index" => $data["rent_index"],
                "cost_living_plus_rent_index" => $data["cost_living_plus_rent_index"],
                "groceries_index" => $data["groceries_index"],
                "restaurant_price_index" => $data["restaurant_price_index"],
                "local_purchasing_power_index" => $data["local_purchasing_power_index"]
            ]);
        }
    }
}
