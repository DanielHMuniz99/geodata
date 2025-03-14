<?php

namespace App\Repositories;

use App\Models\CountryCurrency;
use Carbon\Carbon;

class CountryCurrencyRepository
{
    public $countryCurrencyModel;

    public function __construct(CountryCurrency $countryCurrencyModel)
    {
        $this->countryCurrencyModel = $countryCurrencyModel;
    }

    public function getAll()
    {
        return $this->countryCurrencyModel
            ->select(["country_currencies.currency", "countries.code"])
            ->leftJoin("countries", "countries.id", "country_currencies.country_id")
            ->get();
    }
}