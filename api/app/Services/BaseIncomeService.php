<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class BaseIncomeService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    protected function getCountryModel(string $countryCode)
    {
        $countryModel = $this->countryRepository->findByCode($countryCode);

        if (!$countryModel) {
            throw new \Exception("Country '{$countryCode}' not found.");
        }

        return $countryModel;
    }
}
