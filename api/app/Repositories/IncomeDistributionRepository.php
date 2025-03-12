<?php

namespace App\Repositories;

use App\Models\IncomeDistribution;

class IncomeDistributionRepository
{
    /**
     * @param int $countryId
     */
    public function getLatestIncomeDistributionByCountry(int $countryId)
    {
        return IncomeDistribution::where('country_id', $countryId)
            ->max('year');
    }

    /**
     * @param int $countryId
     * @param int $latestYear
     */
    public function getIncomeDistributionByCountryAndYear(int $countryId, int $latestYear)
    {
        return IncomeDistribution::where('country_id', $countryId)
            ->where('year', $latestYear)
            ->get()
            ->pluck('income_share', 'series');
    }
}
