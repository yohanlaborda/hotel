<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Stringable;

abstract class Id implements Stringable
{
    final protected function __construct(private UuidInterface $id)
    {
    }

    public static function from(UuidInterface $id): static
    {
        return new static($id);
    }

    public static function fromNew(): static
    {
        return static::from(Uuid::uuid4());
    }

    public static function fromString(string $id): static
    {
        return static::from(
            Uuid::fromString($id)
        );
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function equalTo(self $id): bool
    {
        return $this->id->equals($id->id());
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return (string) $this->id();
    }
}
