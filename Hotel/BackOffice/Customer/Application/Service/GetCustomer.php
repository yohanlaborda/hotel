<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Service;

use RuntimeException;
use yohanlaborda\Hotel\BackOffice\Customer\Application\Response\CustomerResponse;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Service\GetCustomerById;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerId;

final class GetCustomer
{
    public function __construct(
        private GetCustomerById $getCustomerById
    ) {
    }

    public function get(string $id): CustomerResponse
    {
        $customer = $this->getCustomerById->getById(CustomerId::fromString($id));
        if (null === $customer) {
            throw new RuntimeException('Customer not found');
        }

        return new CustomerResponse($customer);
    }
}
