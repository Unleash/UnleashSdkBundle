<?php

namespace Unleash\Client\Bundle\DependencyInjection\Dsn;

use Stringable;

final class StaticStringableParameter
{
    /**
     * @readonly
     */
    private string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
