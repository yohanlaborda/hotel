<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Response;

final class CreateCustomerRequest
{
    public function __construct(
        private string $email,
        private string $password,
        private string $name,
        private string $surname,
        private string $street,
        private string $city,
        private string $state,
        private string $country,
        private string $zipCode
    ) {
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function street(): string
    {
        return $this->street;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function zipCode(): string
    {
        return $this->zipCode;
    }
}
