<?php

namespace App\Domain\Cep\Entities;
use App\Domain\Cep\ValueObjects\Cep;

final readonly class Address
{

    public function __construct(
        public Cep $cep,
        public string $state,
        public string $city,
        public string $neighborhood,
        public string $street
    ) {
    }
}