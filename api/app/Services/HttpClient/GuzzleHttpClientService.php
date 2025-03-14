<?php

namespace App\Services\HttpClient;

use App\Interfaces\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\Response;

class GuzzleHttpClientService implements HttpClientInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function request(string $method, string $url, array $data = [], array $headers = []): Response
    {
        $defaultHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $headers = array_merge($defaultHeaders, $headers);

        try {
            $response = $this->client->request($method, $url, [
                'json' => $data,
                'headers' => $headers,
            ]);

            return new Response(
                $response->getBody(),
                $response->getStatusCode(),
                $response->getHeaders()
            );
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
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
        return json_decode($response->getContents(), true);
    }
}