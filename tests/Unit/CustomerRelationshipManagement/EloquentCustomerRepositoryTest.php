<?php

namespace Tests\Unit\CustomerRelationshipManagement;

use App\CustomerRelationshipManagement\Domain\Customers\CustomerFactory;
use App\CustomerRelationshipManagement\Domain\Exceptions\CustomerNotFoundException;
use App\CustomerRelationshipManagement\Infrastructure\Persistence\Eloquent\Repositories\EloquentCustomerRepository;
use App\PortfolioManagement\Infrastructure\Exceptions\EloquentCustomerOperationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentCustomerRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->customerRepository = new EloquentCustomerRepository();
    }

    /** @test */
    public function it_should_add_the_customer(){

        // Given
        $customer = CustomerFactory::create();

        // When
        $this->customerRepository->add($customer);

        // Then
        self::assertEquals($customer, $this->customerRepository->findByCustomerNumber($customer->customerNumber()));
    }

    /** @test */
    public function it_should_find_the_customer_by_email(){

        // Given
        $customer = CustomerFactory::create();
        $this->customerRepository->add($customer);

        // When
        $foundCustomer = $this->customerRepository->findByEmail($customer->email());

        // Then
        self::assertEquals($customer, $foundCustomer);
    }

    /** @test */
    public function it_should_find_the_customer_by_customer_number(){

        // Given
        $customer = CustomerFactory::create();
        $this->customerRepository->add($customer);

        // When
        $foundCustomer = $this->customerRepository->findByCustomerNumber($customer->customerNumber());

        // Then
        self::assertEquals($customer, $foundCustomer);
    }

    /** @test */
    public function it_should_throw_exception_when_adding_customer_with_no_customer_number(){

        // Then
        $this->expectException(EloquentCustomerOperationException::class);

        // Given
        $customer = CustomerFactory::create(1, [
            'customer_number' => null
        ]);

        // When
        $this->customerRepository->add($customer);

    }
}
