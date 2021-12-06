<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Response;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\Shared\Application\Response\AddressResponse;
use yohanlaborda\Hotel\Shared\Application\Response\NameResponse;
use DateTimeInterface;

final class CustomerResponse
{
    public function __construct(private Customer $customer)
    {
    }

    public function id(): string
    {
        return (string) $this->customer->id();
    }

    public function name(): NameResponse
    {
        return new NameResponse($this->customer->name());
    }

    public function address(): AddressResponse
    {
        return new AddressResponse($this->customer->address());
    }

    public function createdDate(): DateTimeInterface
    {
        return $this->customer->createdDate()->date();
    }

    public function updatedDate(): ?DateTimeInterface
    {
        return $this->customer->updatedDate()->date();
    }
}
