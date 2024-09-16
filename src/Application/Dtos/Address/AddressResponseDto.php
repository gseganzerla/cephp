<?php

namespace App\Application\Dtos\Address;

final readonly class AddressResponseDto
{
    private function __construct(
        public string $cep,
        public string $uf,
        public string $localidade,
        public string $bairro,
        public string $logradouro
    ) {
    }


    /**
     * 
     * @param array<string, string> $response
     */
    public static function fromResponse(array $response): self
    {
        return new self(
            cep: $response['cep'],
            uf: $response['uf'],
            localidade: $response['localidade'],
            bairro: $response['bairro'],
            logradouro: $response['logradouro']
        );
    }
}