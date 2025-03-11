<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/countries.json'));
        $countries = json_decode($json, true)['countries'];

        foreach ($countries as $code => $data) {
            DB::table('countries')->insert([
                'code' => $code,
                'country' => $data['label'],
            ]);
        }
    }
}
