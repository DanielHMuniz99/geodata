<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IncomeComparisonService;
use App\Services\PurchasingPowerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiIncomeDistributionsController extends Controller
{
    protected $incomeComparisonService;

    protected $purchasingPowerService;

    public function __construct(
        IncomeComparisonService $incomeComparisonService,
        PurchasingPowerService $purchasingPowerService
    ) {
        $this->incomeComparisonService = $incomeComparisonService;
        $this->purchasingPowerService = $purchasingPowerService;
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function compareIncome(Request $request): JsonResponse
    {
        $request->validate([
            'origin_country' => 'required|string|exists:countries,code',
            'salary' => 'required|numeric|min:0',
            'target_country' => 'required|string|exists:countries,code',
        ]);

        $result = [
            "quality_of_life" => $this->incomeComparisonService->compareQualityOfLife(
                $request->input('salary'),
                $request->input('origin_country'),
                $request->input('target_country')
            ),
            "purchasing_power" => $this->purchasingPowerService->calculateRelativePurchasingPower(
                $request->input('origin_country'),
                $request->input('salary'),
                $request->input('target_country')
            )
        ];

        return response()->json($result);
    }
}