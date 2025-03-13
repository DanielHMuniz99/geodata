<?php

namespace App\Services;

class PurchasingPowerService extends BaseIncomeService
{
    public function calculateRelativePurchasingPower(string $originCountry, float $salary, string $targetCountry)
    {
        try {
            $originCountryModel = $this->getCountryModel($originCountry);
            $targetCountryModel = $this->getCountryModel($targetCountry);

            $gdpOrigin = $originCountryModel->gdp->gdp_per_capita_ppp ?? null;
            $gdpTarget = $targetCountryModel->gdp->gdp_per_capita_ppp ?? null;

            if (!$gdpOrigin || !$gdpTarget) {
                throw new \Exception('GDP per capita PPP data unavailable');
            }

            $powerPurchaseRelative = ($salary * $gdpTarget) / $gdpOrigin;

            return round($powerPurchaseRelative, 2);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
