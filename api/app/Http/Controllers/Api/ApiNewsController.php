<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiNewsService;
use Illuminate\Http\JsonResponse;

class ApiNewsController extends Controller
{
    public $apiNewsService;

    public function __construct(ApiNewsService $apiNewsService)
    {
        $this->apiNewsService = $apiNewsService;
    }

    /**
     * @return JsonResponse
     */
    public function getNews(?string $lang): JsonResponse
    {
        $data = $this->apiNewsService->getNews($lang);
        return response()->json($data);
    }
}