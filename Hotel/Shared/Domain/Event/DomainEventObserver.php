<?php

namespace yohanlaborda\Hotel\Shared\Domain\Event;

interface DomainEventObserver
{
    public function handle(DomainEvent $event): void;

    public function isSubscribedTo(DomainEvent $event): bool;
}
