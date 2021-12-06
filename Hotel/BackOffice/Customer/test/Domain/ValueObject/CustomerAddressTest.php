<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\test\Domain\ValueObject;

use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerAddress;
use yohanlaborda\Hotel\Shared\test\Domain\ValueObject\TestAddress;

/**
 * @covers \yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerAddress
 */
final class CustomerAddressTest extends TestAddress
{
    public function getInstance(): string
    {
        return CustomerAddress::class;
    }
}
