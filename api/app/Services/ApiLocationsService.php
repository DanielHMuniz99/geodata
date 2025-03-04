<?php

namespace App\Services;

use App\Interfaces\ApiLocalidadesInterface;
use Illuminate\Support\Facades\Http;

class ApiLocationsService implements ApiLocalidadesInterface
{
    protected string $baseUrl = 'https://servicodados.ibge.gov.br/api/v1/localidades';

    /**
     * @param int|null $id
     * 
     * @return array
     */
    public function getDistritosById(?int $id): array
    {
        $url = $this->baseUrl . '/distritos';
        if ($id !== null) {
            $url .= '/' . $id;
        }

        $response = Http::get($url);
        return $response->json();
    }

    /**
     * @param string|null $uf
     * 
     * @return array
     */
    public function getDistritosByUf(?string $uf): array
    {
        $url = $this->baseUrl . '/estados';
        if ($uf !== null) {
            $url .= '/' . $uf;
        }
        $url .= '/distritos';

        $response = Http::get($url);
        return $response->json();
    }

    /**
     * @param int|null $mesorregiao
     * 
     * @return array
     */
    public function getDistritosByMesorregiao(?int $mesorregiao): array
    {
        $url = $this->baseUrl . '/mesorregioes';
        if ($mesorregiao !== null) {
            $url .= '/' . $mesorregiao;
        }
        $url .= '/distritos';

        $response = Http::get($url);
        return $response->json();
    }

    /**
     * @param int|null $microrregiao
     * 
     * @return array
     */
    public function getDistritosByMicrorregiao(?int $microrregiao): array
    {
        $url = $this->baseUrl . '/microrregioes';
        if ($microrregiao !== null) {
            $url .= '/' . $microrregiao;
        }
        $url .= '/distritos';

        $response = Http::get($url);
        return $response->json();
    }

    /**
     * @param int|null $municipio
     * 
     * @return array
     */
    public function getDistritosByMunicipio(?int $municipio): array
    {
        $url = $this->baseUrl . '/municipios';
        if ($municipio !== null) {
            $url .= '/' . $municipio;
        }
        $url .= '/distritos';

        $response = Http::get($url);
        return $response->json();
    }
}