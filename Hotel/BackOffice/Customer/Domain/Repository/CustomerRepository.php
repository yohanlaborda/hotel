<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Repository;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;

interface CustomerRepository
{
    public function nextId(): CustomerId;

    public function findById(CustomerId $id): ?Customer;

    public function save(Customer $customer): void;
}
