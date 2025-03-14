<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    /**
     * @param string $code
     */
    public function findByCode(string $code)
    {
        return Country::where('code', $code)->first();
    }

    public function getAll()
    {
        return Country::all();
    }

    public function getCountriesWithData()
    {
        return Country::select('countries.id', 'countries.country', 'countries.code')
            ->join('income_distributions', 'income_distributions.country_id', '=', 'countries.id')
            ->join('cost_of_living', 'cost_of_living.country_id', '=', 'countries.id')
            ->distinct()
            ->get();
    }
}
