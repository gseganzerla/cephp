<?php

namespace App\Application\Dtos\Address;

final readonly class AddressSearchDto
{
    public function __construct(
        public string $state,
        public string $city,
        public string $street
    ) {
    }
}