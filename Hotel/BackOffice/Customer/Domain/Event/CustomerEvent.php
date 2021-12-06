<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Event;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\Shared\Domain\Event\DomainEvent;

interface CustomerEvent extends DomainEvent
{
    public function customer(): Customer;
}
