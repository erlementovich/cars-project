<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

class SalonsClientService
{
    private $login;
    private $password;
    private $apiUrl;
    private $client;

    /**
     * SalonsClientService constructor.
     * @param $login
     * @param $password
     * @param $apiUrl
     */
    public function __construct()
    {
        $this->apiUrl = config('studentsapi.domain');
        $this->login = config('studentsapi.login');
        $this->password = config('studentsapi.password');
        $this->client = $this->setClientParams();
    }

    public function setClientParams()
    {
        $client = Http::baseUrl($this->apiUrl . '/salons');
        $client->withBasicAuth($this->login, $this->password);
        $client->withoutVerifying();

        return $client;
    }

    public function get(string $endpoint = '', $query = null)
    {
        try {
            $response = $this->client->get($endpoint, $query);

            if (!$response->successful()) {
                $response->throw();
            }

            return $response->json();

        } catch (HttpClientException $e) {
            report($e);
        }
    }

}
