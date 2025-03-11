<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class IncomeShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/income_share_series.json'));
        $series = json_decode($json, true);

        foreach ($series as $code => $serie) {

            $country = DB::table('countries')->where('code', $serie["code"])->first();

            DB::table('income_distributions')->insert([
                'country_id' => $country->id,
                'year' => $serie['year'],
                'series' => $serie['series'],
                'income_share' => $serie['income_share']
            ]);
        }
    }
}
