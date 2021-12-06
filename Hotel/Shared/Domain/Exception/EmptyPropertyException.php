<?php

namespace yohanlaborda\Hotel\Shared\Domain\Exception;

use InvalidArgumentException;

final class EmptyPropertyException extends InvalidArgumentException implements ValidateException
{
    private function __construct(
        private string $property,
        string $message
    ) {
        parent::__construct($message);
    }

    public static function from(string $property): self
    {
        return new self(
            $property,
            sprintf('The %s cannot be empty', $property)
        );
    }

    public function property(): string
    {
        return $this->property;
    }
}
