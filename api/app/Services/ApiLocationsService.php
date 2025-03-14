<?php

namespace App\Services;

use App\Interfaces\ApiLocationsInterface;
use Illuminate\Support\Facades\Http;
use App\Services\HttpClient\HttpClientService;
use App\Interfaces\HttpClientInterface;

class ApiLocationsService implements ApiLocationsInterface
{
    protected string $baseUrl = 'https://servicodados.ibge.gov.br/api/v1/localidades';

    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return array
     */
    public function getStates(): array
    {
        $url = "{$this->baseUrl}/estados";
        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @param int|null $id
     * 
     * @return array
     */
    public function getDistrictsById(?int $id): array
    {
        $url = "{$this->baseUrl}/distritos";
        if ($id !== null) {
            $url .= '/' . $id;
        }

        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @param string|null $state
     * 
     * @return array
     */
    public function getDistrictsByFederalUnit(?string $state): array
    {
        $url = "{$this->baseUrl}/estados";
        if ($state !== null) {
            $url .= '/' . $state;
        }
        $url .= '/distritos';

        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @param int|null $mesoregion
     * 
     * @return array
     */
    public function getDistrictsByMesoregion(?int $mesoregion): array
    {
        $url = "{$this->baseUrl}/mesorregioes";
        if ($mesoregion !== null) {
            $url .= '/' . $mesoregion;
        }
        $url .= '/distritos';

        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @param int|null $microregion
     * 
     * @return array
     */
    public function getDistrictsByMicroregion(?int $microregion): array
    {
        $url = "{$this->baseUrl}/microrregioes";
        if ($microregion !== null) {
            $url .= '/' . $microregion;
        }
        $url .= '/distritos';

        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @param int|null $municipality
     * 
     * @return array
     */
    public function getDistrictsByMunicipality(?int $municipality): array
    {
        $url = "{$this->baseUrl}/municipios";
        if ($municipality !== null) {
            $url .= '/' . $municipality;
        }
        $url .= '/distritos';

        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }
}