<?php

namespace yohanlaborda\Hotel\Shared\test\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Address;

abstract class TestAddress extends TestCase
{
    /**
     * @return class-string<Address>
     */
    abstract public function getInstance(): string;

    public function testEmptyStreet(): void
    {
        $this->expectErrorMessage('The street cannot be empty');

        $this->getInstance()::from('', '', '', '', '');
    }

    public function testEmptyCity(): void
    {
        $this->expectErrorMessage('The city cannot be empty');

        $this->getInstance()::from('Street', '', '', '', '');
    }

    public function testEmptyState(): void
    {
        $this->expectErrorMessage('The state cannot be empty');

        $this->getInstance()::from('Street', 'City', '', '', '');
    }

    public function testEmptyCountry(): void
    {
        $this->expectErrorMessage('The country cannot be empty');

        $this->getInstance()::from('Street', 'City', 'State', '', '');
    }

    public function testEmptyZipCode(): void
    {
        $this->expectErrorMessage('The zip code cannot be empty');

        $this->getInstance()::from('Street', 'City', 'State', 'Country', '');
    }

    public function testFormat(): void
    {
        $address = $this->getInstance()::from('Street', 'City', 'State', 'Country', '01101');

        self::assertSame('Street, 01101 City, State, Country', (string) $address);
    }
}
