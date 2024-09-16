<?php

namespace Tests\Unit\Infrastructure\RestClients;

use App\Infrastructure\RestClients\GuzzleRestClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GuzzleRestClientTest extends TestCase
{
    private GuzzleRestClient $restClient;

    #[Test]
    public function responseIsSuccessfull(): void
    {

        $fakePayload = '{"fake": "json:"}';
        $mock = new MockHandler([
            new Response(status: 200, body: $fakePayload)
        ]);

        $handlerStack = HandlerStack::create($mock);

        $this->restClient = new GuzzleRestClient(
            new Client(["handler" => $handlerStack])
        );

        $response = $this->restClient->get("/");

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals($fakePayload, $response->body);
    }
}