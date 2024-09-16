<?php

namespace App\Application\Services\Cep\Contracts;

use App\Application\Dtos\Address\AddressOutputDto;
use InvalidArgumentException;

interface CepService 
{
    /**
     * @throws InvalidArgumentException
     */
    public function findByCep(string $cep): AddressOutputDto;
}