<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\IntegrationService;
use App\Http\Controllers\Controller;

class IntegrationsController extends Controller
{
    public $integrationService;

    public function __construct(IntegrationService $integrationService)
    {
        $this->integrationService = $integrationService;
    }

    public function getAvailableIntegrations()
    {
        $integrations = $this->integrationService->getAvailableIntegrations();
        return response()->json($integrations);
    }

    public function update(Request $request)
    {
        $response = $this->integrationService->updateOrCreate($request->input("key"), $request->input("value"));
        return response()->json($response);
    }
}
