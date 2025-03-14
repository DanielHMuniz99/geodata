<?php

namespace App\Services;

use App\Repositories\CountryRepository;
use App\Repositories\CostOfLivingRepository;

class BaseIncomeService
{
    protected $countryRepository;

    protected $costOfLivingRepository;

    public function __construct(
        CountryRepository $countryRepository,
        CostOfLivingRepository $costOfLivingRepository
    ) {
        $this->countryRepository = $countryRepository;
        $this->costOfLivingRepository = $costOfLivingRepository;
    }

    /**
     * @param string $countryCode
     */
    protected function getCountryModel(string $countryCode)
    {
        $countryModel = $this->countryRepository->findByCode($countryCode);

        if (!$countryModel) {
            throw new \Exception("Country '{$countryCode}' not found.");
        }

        return $countryModel;
    }

    /**
     * @param int $countryId
     */
    protected function getCostOfLivingByCountry(int $countryId)
    {
        $costOfLivingModel = $this->costOfLivingRepository->findById($countryId);

        if (!$costOfLivingModel) {
            throw new \Exception("Country '{$countryId}' not found.");
        }

        return $costOfLivingModel;
    }
}
