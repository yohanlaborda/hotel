<?php

namespace yohanlaborda\Hotel\Shared\Domain\ValueObject;

use Stringable;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\EmptyValidate;
use yohanlaborda\Hotel\Shared\Domain\ValueObject\Validate\MaximumLengthValidate;

abstract class Address implements Stringable
{
    use EmptyValidate;
    use MaximumLengthValidate;

    private const STREET_MAXIMUM_LENGTH = 250;
    private const CITY_MAXIMUM_LENGTH = 100;
    private const STATE_MAXIMUM_LENGTH = 100;
    private const COUNTRY_MAXIMUM_LENGTH = 100;
    private const ZIP_CODE_MAXIMUM_LENGTH = 20;

    final protected function __construct(
        private string $street,
        private string $city,
        private string $state,
        private string $country,
        private string $zipCode
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        $this->validateEmptyProperties();
        $this->validateMaximumLengthProperties();
    }

    private function validateEmptyProperties(): void
    {
        $this->validateIsEmpty($this->street, 'street');
        $this->validateIsEmpty($this->city, 'city');
        $this->validateIsEmpty($this->state, 'state');
        $this->validateIsEmpty($this->country, 'country');
        $this->validateIsEmpty($this->zipCode, 'zip code');
    }

    private function validateMaximumLengthProperties(): void
    {
        $this->validateMaximumLength($this->street, 'street', self::STREET_MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->city, 'city', self::CITY_MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->state, 'state', self::STATE_MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->country, 'country', self::COUNTRY_MAXIMUM_LENGTH);
        $this->validateMaximumLength($this->zipCode, 'zip code', self::ZIP_CODE_MAXIMUM_LENGTH);
    }

    public static function from(string $street, string $city, string $state, string $country, string $zipCode): static
    {
        return new static($street, $city, $state, $country, $zipCode);
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

    public function change(string $street, string $city, string $state, string $country, string $zipCode): static
    {
        return static::from($street, $city, $state, $country, $zipCode);
    }

    public function changeStreet(string $street): static
    {
        return static::from(
            $street,
            $this->city,
            $this->state,
            $this->country,
            $this->zipCode
        );
    }

    public function changeCity(string $city): static
    {
        return static::from(
            $this->street,
            $city,
            $this->state,
            $this->country,
            $this->zipCode
        );
    }

    public function changeState(string $state): static
    {
        return static::from(
            $this->street,
            $this->city,
            $state,
            $this->country,
            $this->zipCode
        );
    }

    public function changeCountry(string $country): static
    {
        return static::from(
            $this->street,
            $this->city,
            $this->state,
            $country,
            $this->zipCode
        );
    }

    public function changeZipCode(string $zipCode): static
    {
        return static::from(
            $this->street,
            $this->city,
            $this->state,
            $this->country,
            $zipCode
        );
    }

    public function equalTo(self $address): bool
    {
        return $this->street === $address->street()
            && $this->city === $address->city()
            && $this->state === $address->state()
            && $this->country === $address->country()
            && $this->zipCode === $address->zipCode();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return sprintf(
            '%s, %s %s, %s, %s',
            $this->street(),
            $this->zipCode(),
            $this->city(),
            $this->state(),
            $this->country()
        );
    }
}
