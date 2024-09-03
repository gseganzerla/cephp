<?php


namespace Tests\Unit\Domain\Cep\ValueObjects;

use App\Domain\Cep\ValueObjects\Cep;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use ValueError;


final class CepTest extends TestCase
{
    #[Test]
    public function stringRepresentation(): void
    {
        $value = '00000-000';

        $cep = new Cep($value);

        $this->assertEquals($value, "{$cep}");
    }

    #[Test]
    public function validateCepInstanciation(): void
    {
        $value = '00000-000';

        $cep = new Cep($value);

        $this->assertInstanceOf(Cep::class, $cep);
    }

    #[Test]
    #[DataProvider('invalidCepProvider')]
    public function cannotInstanciateWithInvalidCep(string $value): void
    {
        $this->expectException(ValueError::class);

        new Cep($value);
    }

    /**
     * 
     * @return array<array<string>>
     */
    public static function invalidCepProvider(): array
    {
        return [
            ["000000000"],
            ["qweqwqwq"],
            ["4sasdf@!"]
        ];
    }
}