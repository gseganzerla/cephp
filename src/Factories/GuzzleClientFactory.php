<?php

namespace App\Factories;

use App\Factories\Contracts\SimpleFactory;
use GuzzleHttp\Client;

/**
 * @implements SimpleFactory<Client>
 */
readonly final class GuzzleClientFactory implements SimpleFactory
{
    public static function create(): Client
    {
        return new Client([
            'base_uri' => 'https://viacep.com.br/ws/',
            'timeout' => 2.0
        ]);
    }
}