<?php

namespace App\Services;

use App\Repositories\CountryRepository;
use App\Repositories\IncomeDistributionRepository ;

class ApiIncomeComparisonService
{
    protected $incomeBrackets = [
        'lowest_10' => 10,
        'lowest_20' => 20,
        'second_20' => 40,
        'third_20' => 60,
        'fourth_20' => 80,
        'highest_20' => 100
    ];

    public $countryRepository;

    public $incomeDistributionRepository;

    public function __construct(CountryRepository $countryRepository, IncomeDistributionRepository $incomeDistributionRepository) {
        $this->countryRepository = $countryRepository;
        $this->incomeDistributionRepository = $incomeDistributionRepository;
    }

    /**
     * @param string $originCountry
     * @param float $salary
     * @param string $targetCountry
     * 
     * @return int
     */
    public function compare(string $originCountry, float $salary, string $targetCountry): int
    {
        $targetCountryModel = $this->countryRepository->findByCode($targetCountry);

        if (!$targetCountryModel) {
            return ['error' => 'Comparison country not found'];
        }

        $latestYear = $this->incomeDistributionRepository->getLatestIncomeDistributionByCountry($targetCountryModel->id);
        $incomeData = $this->incomeDistributionRepository->getIncomeDistributionByCountryAndYear($targetCountryModel->id, $latestYear);

        if ($incomeData->isEmpty()) {
            return ['error' => 'Income data not available for target country'];
        }

        $gdpPerCapita = ($targetCountryModel->gdp->gdp_per_capita_ppp ?? null) / 12;
        if (!$gdpPerCapita) {
            return ['error' => 'GDP per capita data not found'];
        }

        $bracketValues = [];
        $cumulativePercentage = 0;
        foreach ($this->incomeBrackets as $key => $percentile) {
            $cumulativePercentage = $percentile;
            $bracketValues[$key] = ($incomeData[$key] / 100) * $gdpPerCapita;
        }

        $percentilePosition = 0;
        foreach ($bracketValues as $key => $value) {
            if ($salary > $value) {
                $percentilePosition = $this->incomeBrackets[$key];
            } else {
                break;
            }
        }

        return $percentilePosition;
    }
}
