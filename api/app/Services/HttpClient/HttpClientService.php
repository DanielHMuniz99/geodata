<?php

namespace App\Services\HttpClient;

use App\Interfaces\HttpClientInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class HttpClientService implements HttpClientInterface
{
    public function request(string $method, string $url, array $data = [], array $headers = []): Response
    {
        $defaultHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $headers = array_merge($defaultHeaders, $headers);

        $urlWithParams = $url . (strpos($url, '?') === false ? '?' : '&') . http_build_query($data);

        $response = Http::withHeaders($headers)->$method($urlWithParams);
        $response->throw();

        return $response;
    }

    public function get(string $url, array $headers = []): Response
    {
        return $this->request('GET', $url, [], $headers);
    }

    public function post(string $url, array $data = [], array $headers = []): Response
    {
        return $this->request('POST', $url, $data, $headers);
    }

    public function put(string $url, array $data = [], array $headers = []): Response
    {
        return $this->request('PUT', $url, $data, $headers);
    }

    public function delete(string $url, array $data = [], array $headers = []): Response
    {
        return $this->request('DELETE', $url, $data, $headers);
    }

    public function response(Response $response): array
    {
        return $response->json();
    }
}