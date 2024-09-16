<?php

namespace App\Application\Services\RestClients\Response;

readonly class Response
{
    public function __construct(public string $body, public int $statusCode)
    {
    }
}