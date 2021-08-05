<?php

namespace App\Services;

use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private $login;
    private $password;
    private $apiUrl;
    private $client;

    /**
     * SalonsClientService constructor.
     * @param string $login
     * @param string $password
     * @param string $apiUrl
     */
    public function __construct(string $login, string $password, string $apiUrl)
    {
        $this->login = $login;
        $this->apiUrl = $apiUrl;
        $this->password = $password;
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
