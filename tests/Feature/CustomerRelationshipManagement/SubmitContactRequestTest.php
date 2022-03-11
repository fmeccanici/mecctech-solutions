<?php

namespace Tests\Feature\CustomerRelationshipManagement;

use App\CustomerRelationshipManagement\Application\SubmitContactRequest\SubmitContactRequest;
use App\CustomerRelationshipManagement\Application\SubmitContactRequest\SubmitContactRequestInput;
use App\CustomerRelationshipManagement\Domain\Customers\Customer;
use App\CustomerRelationshipManagement\Domain\Exceptions\CustomerNotFoundException;
use App\CustomerRelationshipManagement\Domain\Notifications\Notification;
use App\CustomerRelationshipManagement\Domain\Repositories\CustomerRepositoryInterface;
use App\CustomerRelationshipManagement\Domain\Services\NotificationSenderServiceInterface;
use Mockery\MockInterface;
use Tests\TestCase;

class SubmitContactRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->customerRepository = new DummyCustomerRepository();
        $this->notificationSenderService = new DummyNotificationSenderService();
    }

    /** @test */
    public function it_should_return_status_redirect(){

        // Given
        $url = route('submit-contact-request');

        // When
        $response = $this->post($url, [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Test Message'
        ]);

        // Then
        self::assertEquals(302, $response->status());
    }

    /** @test */
    public function it_should_return_successfully_sent_parameter(){

        // Given
        $url = route('submit-contact-request');

        // When
        $response = $this->post($url, [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Test Message'
        ]);

        // Then
        self::assertNotEmpty(json_decode($response->content()));
    }

    /** @test */
    public function it_should_add_customer_if_it_does_not_exist(){

        // Given
        $customer = new Customer(null, "John", "Doe", "johndoe@example.com");
        $message = "johndoe@example.com";
        $notificationSenderServiceMock = $this->mock(NotificationSenderServiceInterface::class, function (MockInterface $mock) use ($message) {
            $mock->shouldReceive('send')
                ->once()
                ->andReturn(new Notification($message));
        });
        $submitContactRequest = new SubmitContactRequest($this->customerRepository,
                                                            $notificationSenderServiceMock);
        $submitContactRequestInput = new SubmitContactRequestInput([
            "customer" => $customer->toArray(),
            "message" => $message
        ]);

        // When
        $submitContactRequestResult = $submitContactRequest->execute($submitContactRequestInput);


        // Then
        self::assertNotNull($this->customerRepository->findByEmail($customer->email()));
    }

    /** @test */
    public function it_should_send_notification_of_new_message(){

        // Given
        $customer = new Customer(uniqid(), "John", "Doe", "johndoe@example.com");
        $message = "Test Message";

        $submitContactRequest = new SubmitContactRequest($this->customerRepository,
                                                            $this->notificationSenderService);
        $submitContactRequestInput = new SubmitContactRequestInput([
            "customer" => $customer->toArray(),
            "message" => $message
        ]);

        // When
        $submitContactRequestResult = $submitContactRequest->execute($submitContactRequestInput);

        // Then
        $expectedMessage = $customer->name()." has sent the following message: ".$message;

        self::assertEquals(new Notification($expectedMessage), $submitContactRequestResult->notificationSent());
    }

    /** @test */
    public function it_should_create_a_customer_number_when_customer_does_not_exist(){

        $customer = new Customer(null, "John", "Doe", "johndoe@example.com");
        $message = "johndoe@example.com";
        $notificationSenderServiceMock = $this->mock(NotificationSenderServiceInterface::class, function (MockInterface $mock) use ($message) {
            $mock->shouldReceive('send')
                ->once()
                ->andReturn(new Notification($message));
        });

        $submitContactRequest = new SubmitContactRequest($this->customerRepository,
            $notificationSenderServiceMock);
        $submitContactRequestInput = new SubmitContactRequestInput([
            "customer" => $customer->toArray(),
            "message" => $message
        ]);

        // When
        $submitContactRequestResult = $submitContactRequest->execute($submitContactRequestInput);


        // Then
        self::assertNotNull($this->customerRepository->findByEmail($customer->email())->customerNumber());
    }
}
