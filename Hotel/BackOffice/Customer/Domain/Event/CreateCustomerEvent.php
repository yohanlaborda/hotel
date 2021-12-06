<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Event;

use DateTimeImmutable;
use DateTimeInterface;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;

final class CreateCustomerEvent implements CustomerEvent
{
    public function __construct(private Customer $customer)
    {
    }

    public function customer(): Customer
    {
        return $this->customer;
    }

    public function occurredOn(): DateTimeInterface
    {
        return new DateTimeImmutable();
    }
}
