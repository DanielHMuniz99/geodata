<?php

namespace App\Repositories;

use App\Models\IncomeDistribution;

class IncomeDistributionRepository
{
    public $incomeDistribution;

    public function __construct(IncomeDistribution $incomeDistribution)
    {
        $this->incomeDistribution = $incomeDistribution;
    }

    /**
     * @param int $countryId
     */
    public function getLatestIncomeDistributionByCountry(int $countryId)
    {
        return $this->incomeDistribution->where('country_id', $countryId)
            ->max('year');
    }

    /**
     * @param int $countryId
     * @param int $latestYear
     */
    public function getIncomeDistributionByCountryAndYear(int $countryId, int $latestYear)
    {
        return $this->incomeDistribution->where('country_id', $countryId)
            ->where('year', $latestYear)
            ->get()
            ->pluck('income_share', 'series');
    }
}
