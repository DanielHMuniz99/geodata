<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryGdpSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/countries_gdp_2024.json'));
        $countriesGdp = json_decode($json, true);

        foreach ($countriesGdp as $data) {

            $country = DB::table('countries')->where('code', $data['country'])->first();

            if (!$country) {
                continue;
            }

            DB::table('country_gdp')->insert([
                'country_id' => $country->id,
                'year' => $data['year'],
                'gdp_growth' => $data['gdp_growth'],
                'gdp_nominal' => $data['gdp_nominal'],
                'gdp_per_capita_nominal' => $data['gdp_per_capita_nominal'],
                'gdp_ppp' => $data['gdp_ppp'],
                'gdp_per_capita_ppp' => $data['gdp_per_capita_ppp'],
                'gdp_ppp_share' => $data['gdp_ppp_share'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
