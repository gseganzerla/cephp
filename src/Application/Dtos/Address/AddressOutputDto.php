<?php

namespace App\Application\Dtos\Address;

final readonly class AddressOutputDto
{
    public function __construct(
        public string $cep,
        public string $state,
        public string $city,
        public string $neighborhood,
        public string $street,
    ) {
    }
}