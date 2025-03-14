<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryCurrenciesSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/country_currencies.json'));
        $countries = json_decode($json, true);

        foreach ($countries as $code => $data) {

            $country = DB::table('countries')->where('code', $data["code"])->first();

            DB::table('country_currencies')->insert([
                'country_id' => $country->id,
                'currency' => $data["currency"],
            ]);
        }
    }
}
