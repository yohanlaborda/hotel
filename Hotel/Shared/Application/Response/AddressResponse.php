<?php

namespace yohanlaborda\Hotel\Shared\Application\Response;

use yohanlaborda\Hotel\Shared\Domain\ValueObject\Address;

final class AddressResponse
{
    public function __construct(private Address $address)
    {
    }

    public function street(): string
    {
        return $this->address->street();
    }

    public function city(): string
    {
        return $this->address->city();
    }

    public function state(): string
    {
        return $this->address->state();
    }

    public function country(): string
    {
        return $this->address->country();
    }

    public function zipCode(): string
    {
        return $this->address->zipCode();
    }
}
