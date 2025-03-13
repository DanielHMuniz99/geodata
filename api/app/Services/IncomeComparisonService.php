<?php

namespace App\Services;

use App\Repositories\IncomeDistributionRepository;
use App\Repositories\CountryRepository;

class IncomeComparisonService extends BaseIncomeService
{
    protected $incomeBrackets = [
        'lowest_10' => 10,
        'lowest_20' => 20,
        'second_20' => 40,
        'third_20' => 60,
        'fourth_20' => 80,
        'highest_20' => 100
    ];

    protected $incomeDistributionRepository;

    public function __construct(
        CountryRepository $countryRepository,
        IncomeDistributionRepository $incomeDistributionRepository
    ) {
        parent::__construct($countryRepository);
        $this->incomeDistributionRepository = $incomeDistributionRepository;
    }

    public function compare(float $salary, string $targetCountry): int
    {
        try {
            $targetCountryModel = $this->getCountryModel($targetCountry);

            $latestYear = $this->incomeDistributionRepository->getLatestIncomeDistributionByCountry($targetCountryModel->id);

            if (!$latestYear) {
                throw new \Exception('Income data not available for target country');
            }

            $incomeData = $this->incomeDistributionRepository->getIncomeDistributionByCountryAndYear($targetCountryModel->id, $latestYear);
            if ($incomeData->isEmpty()) {
                throw new \Exception('Income data not available for target country');
            }

            $gdpPerCapita = ($targetCountryModel->gdp->gdp_per_capita_ppp ?? null) / 12;

            if (!$gdpPerCapita) {
                throw new \Exception('GDP per capita data not found');
            }

            $bracketValues = [];
            foreach ($this->incomeBrackets as $key => $percentile) {
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
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
