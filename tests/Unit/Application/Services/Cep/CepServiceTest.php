<?php


namespace Tests\Unit\Application\Services\Cep;

use App\Application\Dtos\Address\AddressOutputDto;
use App\Application\Services\Cep\CepService;
use App\Application\Services\RestClients\Contracts\RestClient;
use App\Application\Services\RestClients\Response\Response;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class CepServiceTest extends TestCase
{
    private CepService $service;

    /** @var RestClient&MockObject */
    private RestClient $restclient;

    public function setUp(): void
    {
        $this->restclient = $this->createMock(RestClient::class);
        $this->service = new CepService($this->restclient);
    }

    #[Test]
    public function testFindByCep(): void
    {
        $fakeCep = "00000000";
        $responseBody = '{
            "cep": "00000000",
            "uf": "SP",
            "localidade": "São Paulo",
            "bairro": "Centro",
            "logradouro": "Rua Exemplo"
        }';

        $this->restclient
            ->method('get')
            ->with($fakeCep)
            ->willReturn(new Response(
                $responseBody,
                200
            ));
        ;

        $address = $this->service->findByCep($fakeCep);

        $this->assertEquals($fakeCep, $address->cep);
        $this->assertInstanceOf(
            AddressOutputDto::class,
            $address
        );
    }
}