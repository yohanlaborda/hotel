<?php

namespace yohanlaborda\Hotel\Shared\Domain\Generator;

interface PasswordGenerator
{
    public function generate(string $password): string;
}
