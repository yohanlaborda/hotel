<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use Stringable;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\EmptyValidate;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\MaximumLengthValidate;

abstract class Name implements Stringable
{
    use EmptyValidate;
    use MaximumLengthValidate;

    protected const MAXIMUM_LENGTH = 100;

    final protected function __construct(
        private string $name,
        private string $surname
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        $this->validateIsEmpty($this->name, 'name');
        $this->validateIsEmpty($this->surname, 'surname');
        $this->validateMaximumLength($this->name, 'name', self::MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->name, 'surname', self::MAXIMUM_LENGTH);
    }

    public static function from(string $name, string $surname): static
    {
        return new static($name, $surname);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function fullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    public function change(string $name, string $surname): static
    {
        return static::from(
            $name,
            $surname
        );
    }

    public function changeName(string $name): static
    {
        return static::from(
            $name,
            $this->surname
        );
    }

    public function changeSurname(string $surname): static
    {
        return static::from(
            $this->name,
            $surname
        );
    }

    public function equalTo(self $name): bool
    {
        return $this->name === $name->name()
            && $this->surname === $name->surname();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->fullName();
    }
}
