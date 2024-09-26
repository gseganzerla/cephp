<?php

namespace Tests\Unit\Infrastructure\Commands\Symfony;

use App\Application\Dtos\Address\AddressOutputDto;
use App\Application\Services\Cep\Contracts\CepService;
use App\Infrastructure\Commands\Symfony\CepCommand;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CepCommandTest extends TestCase
{

    private CepCommand $command;
    private CommandTester $commandTester;

    /**
     * @var CepService&MockObject $cepService;
     */
    private CepService $cepService;

    public function setUp(): void
    {
        $this->cepService = $this->createMock(CepService::class);
        $this->command = new CepCommand($this->cepService);
        $this->commandTester = new CommandTester($this->command);
    }

    #[Test]
    public function testCommandExecution(): void
    {
        $param = '01001000';

        $this->cepService->method('findByCep')
            ->with($param)
            ->willReturn(new AddressOutputDto(
                cep: $param,
                state: 'fake-state',
                city: 'fake-city',
                neighborhood: 'fake-neighborhood',
                street: 'fake-street'
            ));

        $this->commandTester->execute(['cep' => $param]);

        $this->commandTester->assertCommandIsSuccessful();
        $this->assertStringContainsString(
            $param,
            $this->commandTester->getDisplay()
        );
    }
}