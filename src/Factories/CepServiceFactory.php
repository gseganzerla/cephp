<?php

namespace App\Factories;

use App\Application\Services\Cep\CepService;
use App\Factories\Contracts\SimpleFactory;
use App\Infrastructure\RestClients\GuzzleRestClient;
use Override;

/**
 * @implements SimpleFactory<CepServiceFactory>
 */
final readonly class CepServiceFactory implements SimpleFactory
{

    #[Override()]
    public static function create(): CepService
    {
        $restClient = new GuzzleRestClient(GuzzleClientFactory::create());
        return new CepService($restClient);
    }
}