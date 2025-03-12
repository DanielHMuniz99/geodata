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
}
