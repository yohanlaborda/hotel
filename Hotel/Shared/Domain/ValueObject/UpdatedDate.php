<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use DateTimeImmutable;
use DateTimeInterface;
use Stringable;

abstract class UpdatedDate implements Stringable
{
    final protected function __construct(
        private ?DateTimeInterface $date
    ) {
    }

    public static function from(?DateTimeInterface $date): static
    {
        return new static($date);
    }

    public static function fromString(string $date): static
    {
        return static::from(
            new DateTimeImmutable($date)
        );
    }

    public static function fromEmpty(): static
    {
        return static::from(null);
    }

    public function date(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function change(?DateTimeInterface $date): static
    {
        return static::from($date);
    }

    public function equalTo(self $updatedDate): bool
    {
        return $this->date?->getTimestamp() === $updatedDate->date()?->getTimestamp();
    }

    public function isEmpty(): bool
    {
        return $this->date === null;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->date?->format(DateTimeInterface::ATOM) ?? '';
    }
}
