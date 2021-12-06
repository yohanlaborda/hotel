<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use DateTimeImmutable;
use DateTimeInterface;
use Stringable;

abstract class CreatedDate implements Stringable
{
    final protected function __construct(
        private DateTimeInterface $date
    ) {
    }

    public static function from(DateTimeInterface $date): static
    {
        return new static($date);
    }

    public static function fromString(string $date): static
    {
        return static::from(
            new DateTimeImmutable($date)
        );
    }

    public static function fromCurrent(): static
    {
        return static::from(
            new DateTimeImmutable()
        );
    }

    public function date(): DateTimeInterface
    {
        return $this->date;
    }

    public function change(DateTimeInterface $date): static
    {
        return static::from($date);
    }

    public function equalTo(self $createdDate): bool
    {
        return $this->date->getTimestamp() === $createdDate->date()->getTimestamp();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->date->format(DateTimeInterface::ATOM);
    }
}
