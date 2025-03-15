<?php

namespace App\Repositories;

use App\Models\CountryGdp;

class CountryGdpRepository
{
    public $countryGdp;

    public function __construct(CountryGdp $countryGdp)
    {
        $this->countryGdp = $countryGdp;
    }

    public function getAll()
    {
        return $this->countryGdp->with('country')->get();
    }

    /**
     * @param int $countryId
     * @param string $year
     */
    public function getByCountryAndYear(int $countryId, string $year)
    {
        return $this->countryGdp->where('country_id', $countryId)
            ->where('year', $year)
            ->first();
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->countryGdp->create($data);
    }
}
