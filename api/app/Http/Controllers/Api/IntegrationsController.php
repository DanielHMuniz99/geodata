<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Integration;
use App\Http\Controllers\Controller;

class IntegrationsController extends Controller
{
    public $integration;

    public function __construct(Integration $integration)
    {
        $this->integration = $integration;        
    }

    public function getAll()
    {
        $integrations = $this->integration->all();
        return response()->json($integrations);
    }

    public function update(Request $request)
    {

    }
}
