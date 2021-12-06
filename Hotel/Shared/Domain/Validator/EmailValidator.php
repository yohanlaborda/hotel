<?php

namespace yohanlaborda\Hotel\Shared\Domain\Validator;

interface EmailValidator
{
    public function validate(string $email): bool;
}
