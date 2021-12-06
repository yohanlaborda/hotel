<?php

namespace yohanlaborda\Hotel\Shared\Domain\Event;

final class DomainEventPublisher
{
    private static ?self $instance = null;

    /**
     * @var DomainEventObserver[]
     */
    private array $observers;

    private function __construct()
    {
        $this->observers = [];
    }

    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function attachObservers(DomainEventObserver ...$observes): void
    {
        foreach ($observes as $observe) {
            $this->attachObserver($observe);
        }
    }

    public function attachObserver(DomainEventObserver $observer): void
    {
        $observerClassName = get_class($observer);
        $this->observers[$observerClassName] = $observer;
    }

    public function detachObserver(DomainEventObserver $observer): void
    {
        $observerClassName = get_class($observer);
        unset($this->observers[$observerClassName]);
    }

    public function notify(DomainEvent $event): void
    {
        foreach ($this->observers as $observer) {
            if ($observer->isSubscribedTo($event)) {
                $observer->handle($event);
            }
        }
    }
}
