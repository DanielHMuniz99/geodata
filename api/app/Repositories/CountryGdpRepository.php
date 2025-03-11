<?php

namespace App\Repositories;

use App\Models\CountryGdp;

class CountryGdpRepository
{
    public function getAll()
    {
        return CountryGdp::with('country')->get();
    }

    /**
     * @param int $countryId
     * @param string $year
     */
    public function getByCountryAndYear(int $countryId, string $year)
    {
        return CountryGdp::where('country_id', $countryId)
            ->where('year', $year)
            ->first();
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        return CountryGdp::create($data);
    }
}
