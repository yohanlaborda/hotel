<?php

namespace yohanlaborda\Hotel\Shared\Application\Response;

use yohanlaborda\Hotel\Shared\Domain\ValueObject\Name;

final class NameResponse
{
    public function __construct(private Name $name)
    {
    }

    public function name(): string
    {
        return $this->name->name();
    }

    public function surname(): string
    {
        return $this->name->surname();
    }
}
