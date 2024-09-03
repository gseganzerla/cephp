<?php

namespace App\Domain\Cep\ValueObjects;
use Stringable;
use ValueError;


final readonly class Cep implements Stringable
{
    public string $value;

    /**
     * 
     * @throws ValueError
     */
    public function __construct(string $value)
    {
        if (!$this->validate($value)) {
            throw new ValueError("Must be a valid cep", 1);

        }

        $this->value = $value;
    }

    private function validate(string $value): bool
    {
        return boolval(preg_match('/^\d{5}-\d{3}$/', $value));
    }

    public function __tostring(): string
    {
        return $this->value;
    }
}