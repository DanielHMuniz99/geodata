<?php

namespace App\Services;

use App\Repositories\CountryGdpRepository;
use App\Repositories\CountryRepository;

class ApiCountryGdpService
{
    protected $countryGdpRepository;
    protected $countryRepository;

    public function __construct(CountryGdpRepository $countryGdpRepository, CountryRepository $countryRepository)
    {
        $this->countryGdpRepository = $countryGdpRepository;
        $this->countryRepository = $countryRepository;
    }

    public function getAll()
    {
        return $this->countryGdpRepository->getAll();
    }

    /**
     * @param string $countryCode
     * @param int $year
     */
    public function getByCountryAndYear(string $countryCode, int $year)
    {
        $country = $this->countryRepository->findByCode($countryCode);

        if (!$country) {
            return null;
        }

        return $this->countryGdpRepository->getByCountryAndYear($country->id, $year);
    }
}
