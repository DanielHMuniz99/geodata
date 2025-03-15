<?php

namespace App\Services;

use App\Interfaces\HttpClientInterface;

class TranslationService
{
    protected $httpClient;

    protected $url = "https://openl-translate.p.rapidapi.com/translate/bulk";

    protected $headers = [];

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->headers = [
            'x-rapidapi-host' => 'openl-translate.p.rapidapi.com',
            'x-rapidapi-key' => env("RAPID_API")
        ];

        $this->httpClient = $httpClient;
    }

    /**
     * @param string $message
     * 
     * @return array
     */
    public function translateText(array $message): array
    {
        $response = $this->httpClient->post(
            $this->url,
            [
                "target_lang" => "en",
                "text" => $message
            ],
            $this->headers
        );

        return $this->httpClient->response($response);
    }
}