<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Service;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Repository\CustomerRepository;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;

final class InMemoryCustomerRepository implements CustomerRepository
{
    /**
     * @var Customer[]
     */
    private array $customers = [];

    public function nextId(): CustomerId
    {
        return CustomerId::fromNew();
    }

    public function findById(CustomerId $id): ?Customer
    {
        $customerId = (string) $id;
        return $this->customers[$customerId] ?? null;
    }

    public function save(Customer $customer): void
    {
        $customerId = (string) $customer->id();
        $this->customers[$customerId] = $customer;
    }
}
