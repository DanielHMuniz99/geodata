<?php

namespace App\Interfaces;

use Illuminate\Http\Client\Response;

interface HttpClientInterface
{
    public function request(string $method, string $url, array $data = [], array $headers = []): Response;
    public function get(string $url, array $headers = []): Response;
    public function post(string $url, array $data = [], array $headers = []): Response;
    public function put(string $url, array $data = [], array $headers = []): Response;
    public function delete(string $url, array $data = [], array $headers = []): Response;
    public function response(Response $response): array;
}