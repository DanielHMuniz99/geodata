<?php

namespace App\Services;

use App\Models\Country;
use App\Models\IncomeDistribution;

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

    /**
     * @param string $originCountry
     * @param float $salary
     * @param string $targetCountry
     * 
     * @return int
     */
    public function compare(string $originCountry, float $salary, string $targetCountry): int
    {
        $targetCountryModel = Country::where('code', $targetCountry)->first();
        if (!$targetCountryModel) {
            return ['error' => 'Comparison country not found'];
        }

        $latestYear = IncomeDistribution::where('country_id', $targetCountryModel->id)
            ->max('year');

        $incomeData = IncomeDistribution::where('country_id', $targetCountryModel->id)
            ->where('year', $latestYear)
            ->get()
            ->pluck('income_share', 'series');

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
