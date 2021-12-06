<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Domain\Service;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Repository\CustomerRepository;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;

final class GetCustomerById
{
    public function __construct(private CustomerRepository $repository)
    {
    }

    public function getById(CustomerId $id): ?Customer
    {
        return $this->repository->findById($id);
    }
}
