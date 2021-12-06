<?php

namespace yohanlaborda\Hotel\BackOffice\Customer\Application\Service;

use yohanlaborda\Hotel\BackOffice\Customer\Application\Response\CreateCustomerRequest;
use yohanlaborda\Hotel\BackOffice\Customer\Application\Response\CustomerResponse;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Entity\Customer;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Event\CreateCustomerEvent;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Factory\CustomerFactory;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\Repository\CustomerRepository;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerAddress;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerCreatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerName;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUpdatedDate;
use yohanlaborda\Hotel\BackOffice\Customer\Domain\ValueObject\CustomerUser;
use yohanlaborda\Hotel\Shared\Domain\Event\DomainEventPublisher;
use yohanlaborda\Hotel\Shared\Domain\Generator\PasswordGenerator;

final class CreateCustomer
{
    public function __construct(
        private CustomerRepository $repository,
        private PasswordGenerator $passwordGenerator,
        private CreateCustomerValidator $validator,
    ) {
    }

    public function create(CreateCustomerRequest $request): CustomerResponse
    {
        $customer = $this->createEntity($request);
        $this->validator->validate($customer);
        $this->repository->save($customer);

        DomainEventPublisher::instance()->notify(
            new CreateCustomerEvent($customer)
        );

        return new CustomerResponse($customer);
    }

    private function createEntity(CreateCustomerRequest $request): Customer
    {
        return CustomerFactory::create(
            id: $this->repository->nextId(),
            user: $this->createUser($request),
            name: $this->createName($request),
            address: $this->createAddress($request),
            createdDate: CustomerCreatedDate::fromCurrent(),
            updatedDate: CustomerUpdatedDate::fromEmpty()
        );
    }

    private function createUser(CreateCustomerRequest $request): CustomerUser
    {
        return CustomerUser::from(
            email: $request->email(),
            password: $this->passwordGenerator->generate($request->password())
        );
    }

    private function createName(CreateCustomerRequest $request): CustomerName
    {
        return CustomerName::from(
            name: $request->name(),
            surname: $request->surname()
        );
    }

    private function createAddress(CreateCustomerRequest $request): CustomerAddress
    {
        return CustomerAddress::from(
            street: $request->street(),
            city: $request->city(),
            state: $request->state(),
            country: $request->country(),
            zipCode: $request->zipCode()
        );
    }
}
