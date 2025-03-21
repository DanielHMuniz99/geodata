<?php

namespace App\Http\Controllers\Api;

use App\Services\TranslationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TranslationController extends Controller
{
    protected $translateService;

    public function __construct(TranslationService $translateService)
    {
        $this->translateService = $translateService;
    }

    /**
     * @param Request $request
     */
    public function translateText(?string $lang, Request $request)
    {
        $message[] = $request->input('message');
        $translatedText = $this->translateService->translateText($message, $lang);
        return response()->json($translatedText);
    }
}