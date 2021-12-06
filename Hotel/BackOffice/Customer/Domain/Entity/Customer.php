<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerAddress;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerCreatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerName;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUpdatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUser;

final class Customer
{
    public function __construct(
        private CustomerId $id,
        private CustomerUser $user,
        private CustomerName $name,
        private CustomerAddress $address,
        private CustomerCreatedDate $createdDate,
        private CustomerUpdatedDate $updatedDate
    ) {
    }

    public function id(): CustomerId
    {
        return $this->id;
    }

    public function user(): CustomerUser
    {
        return $this->user;
    }

    public function name(): CustomerName
    {
        return $this->name;
    }

    public function address(): CustomerAddress
    {
        return $this->address;
    }

    public function createdDate(): CustomerCreatedDate
    {
        return $this->createdDate;
    }

    public function updatedDate(): CustomerUpdatedDate
    {
        return $this->updatedDate;
    }

    public function changeName(CustomerName $name): void
    {
        $this->name = $name;
    }

    public function changeAddress(CustomerAddress $address): void
    {
        $this->address = $address;
    }

    public function changeUpdatedDate(CustomerUpdatedDate $updatedDate): void
    {
        $this->updatedDate = $updatedDate;
    }
}
