<?php

namespace yohanlaborda\Hotel\Shared\Domain\Exception;

interface ValidateException
{
    public function property(): string;
}
