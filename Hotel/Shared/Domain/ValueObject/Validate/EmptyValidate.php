<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate;

use yohanlaborda\Hotel\Shared\Domain\Exception\EmptyPropertyException;

trait EmptyValidate
{
    private function validateIsEmpty(string $value, string $property): void
    {
        if (empty($value)) {
            throw EmptyPropertyException::from($property);
        }
    }
}
