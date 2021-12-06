<?php

namespace yohanlaborda\Hotel\Shared\Domain\Event;

use DateTimeInterface;

interface DomainEvent
{
    public function occurredOn(): DateTimeInterface;
}
