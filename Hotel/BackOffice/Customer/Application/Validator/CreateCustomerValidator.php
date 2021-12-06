<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Service;

use InvalidArgumentException;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\Shared\Domain\Validator\EmailValidator;

final class CreateCustomerValidator
{
    public function __construct(
        private EmailValidator $emailValidator
    ) {
    }

    public function validate(Customer $customer): void
    {
        $this->validateEmail($customer->user()->email());
    }

    private function validateEmail(string $email): void
    {
        if (false === $this->emailValidator->validate($email)) {
            throw new InvalidArgumentException('The email is not valid');
        }
    }
}
