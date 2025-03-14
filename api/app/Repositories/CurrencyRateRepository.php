<?php

namespace App\Repositories;

use App\Models\CurrencyRate;
use Carbon\Carbon;

class CurrencyRateRepository
{
    public $currencyRateModel;

    public function __construct(CurrencyRate $currencyRateModel)
    {
        $this->currencyRateModel = $currencyRateModel;
    }

    public function getCurrency()
    {
        return $this->currencyRateModel->first();
    }

    public function store(array $data): CurrencyRate
    {
        return $this->currencyRateModel->updateOrCreate(
            ['date' => Carbon::parse($data['date'])->toDateString()],
            [
                'base_currency' => $data['base'],
                'rates' => json_encode($data['rates']),
            ]
        );
    }
}