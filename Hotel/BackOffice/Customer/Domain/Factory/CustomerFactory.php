<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Factory;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerAddress;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerCreatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerName;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUpdatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUser;

final class CustomerFactory
{
    public static function create(
        CustomerId $id,
        CustomerUser $user,
        CustomerName $name,
        CustomerAddress $address,
        CustomerCreatedDate $createdDate,
        CustomerUpdatedDate $updatedDate
    ): Customer {
        return new Customer(
            id: $id,
            user: $user,
            name: $name,
            address: $address,
            createdDate: $createdDate,
            updatedDate: $updatedDate
        );
    }
}
