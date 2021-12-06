<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use Stringable;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\EmptyValidate;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\MaximumLengthValidate;

abstract class User implements Stringable
{
    use EmptyValidate;
    use MaximumLengthValidate;

    private const EMAIL_MAXIMUM_LENGTH = 360;
    private const PASSWORD_MAXIMUM_LENGTH = 500;

    final protected function __construct(
        private string $email,
        private string $password
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        $this->validateIsEmpty($this->email, 'email');
        $this->validateIsEmpty($this->password, 'password');
        $this->validateMaximumLength($this->email, 'email', self::EMAIL_MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->password, 'password', self::PASSWORD_MAXIMUM_LENGTH);
    }

    public static function from(string $email, string $password): static
    {
        return new static($email, $password);
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function change(string $email, string $password): static
    {
        return static::from(
            $email,
            $password
        );
    }

    public function changeEmail(string $email): static
    {
        return static::from(
            $email,
            $this->password
        );
    }

    public function changePassword(string $password): static
    {
        return static::from(
            $this->email,
            $password
        );
    }

    public function equalTo(self $user): bool
    {
        return $this->email === $user->email;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->email();
    }
}
