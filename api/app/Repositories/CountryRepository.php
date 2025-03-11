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

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        return Country::create($data);
    }
}
