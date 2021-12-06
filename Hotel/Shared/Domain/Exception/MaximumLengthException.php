<?php

namespace yohanlaborda\Hotel\Shared\Domain\Exception;

use InvalidArgumentException;

final class MaximumLengthException extends InvalidArgumentException implements ValidateException
{
    private function __construct(
        private string $property,
        string $message
    ) {
        parent::__construct($message);
    }

    public static function from(string $property, int $length): self
    {
        return new self(
            $property,
            sprintf('The %s cannot exceed %d characters', $property, $length)
        );
    }

    public function property(): string
    {
        return $this->property;
    }
}
