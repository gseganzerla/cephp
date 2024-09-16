<?php

namespace App\Infrastructure\RestClients;

use App\Application\Services\RestClients\Contracts\RestClient;
use App\Application\Services\RestClients\Response\Response;
use GuzzleHttp\Client;
use Override;

final class GuzzleRestClient implements RestClient
{
    public function __construct(private Client $client)
    {
    }

    #[Override()]
    public function get(string $endpoint): Response
    {
        $response = $this->client->get($endpoint);

        return new Response($response->getBody()->getContents(), $response->getStatusCode());
    }
}