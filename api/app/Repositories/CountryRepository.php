<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    public $countryModel;

    public function __construct(Country $countryModel)
    {
        $this->countryModel = $countryModel;
    }

    /**
     * @param string $code
     */
    public function findByCode(string $code)
    {
        return $this->countryModel->where('code', $code)->first();
    }

    public function getAll()
    {
        return $this->countryModel->all();
    }

    public function getCountriesWithData()
    {
        return $this->countryModel->select(['countries.id', 'countries.country', 'countries.code'])
            ->join('income_distributions', 'income_distributions.country_id', '=', 'countries.id')
            ->join('cost_of_living', 'cost_of_living.country_id', '=', 'countries.id')
            ->distinct()
            ->get();
    }
}
