<?php

namespace App\Application\Services\RestClients\Contracts;

use App\Application\Services\RestClients\Response\Response;

interface RestClient
{

    public function get(string $endpoint): Response;
}