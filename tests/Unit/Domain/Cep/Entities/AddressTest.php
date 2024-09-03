<?php

namespace Tests\Unit\Domain\Cep\Entities;
use App\Domain\Cep\Entities\Address;
use App\Domain\Cep\ValueObjects\Cep;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class AddressTest extends TestCase
{
    private Cep $mockedCep;

    public function setUp(): void
    {
        $this->mockedCep = $this->createMock(Cep::class);
    }

    #[Test]
    public function canCreateAnAddress(): void
    {

        $address = new Address(
            cep: $this->mockedCep,
            state: 'fake-state',
            city: 'fake-city',
            neighborhood: 'fake-neighborhood',
            street: 'fake-street'
        );

        $this->assertInstanceOf(Address::class, $address);
    }
}