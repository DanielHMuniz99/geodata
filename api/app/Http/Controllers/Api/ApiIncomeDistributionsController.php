<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IncomeComparisonService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiIncomeDistributionsController extends Controller
{
    protected $incomeComparisonService;

    public function __construct(IncomeComparisonService $incomeComparisonService)
    {
        $this->incomeComparisonService = $incomeComparisonService;
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

        $result = $this->incomeComparisonService->compare(
            $request->input('salary'),
            $request->input('target_country')
        );

        return response()->json($result);
    }
}