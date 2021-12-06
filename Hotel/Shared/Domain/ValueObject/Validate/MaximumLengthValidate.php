<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate;

use yohanlaborda\Hotel\Shared\Domain\Exception\MaximumLengthException;

trait MaximumLengthValidate
{
    private function validateMaximumLength(string $value, string $property, int $length): void
    {
        if (empty($value)) {
            throw MaximumLengthException::from($property, $length);
        }
    }
}
