<?php


namespace App\Application\Services\Cep;

use App\Application\Dtos\Address\AddressOutputDto;
use App\Application\Dtos\Address\AddressResponseDto;
use App\Application\Services\Cep\Contracts\CepService as CepServiceInterface;
use App\Application\Services\RestClients\Contracts\RestClient;
use Override;

final class CepService implements CepServiceInterface
{
    public function __construct(private readonly RestClient $restClientService)
    {
    }

    #[Override()]
    public function findByCep(string $cep): AddressOutputDto
    {
        $response = $this->restClientService->get($cep);

        /**
         * @var array<string, string> $rawData
         */
        $rawData = json_decode($response->body, true);

        $addressResponse = AddressResponseDto::fromResponse($rawData);


        return new AddressOutputDto(
            cep: $addressResponse->cep,
            state: $addressResponse->uf,
            city: $addressResponse->localidade,
            neighborhood: $addressResponse->bairro,
            street: $addressResponse->logradouro
        );
    }

}