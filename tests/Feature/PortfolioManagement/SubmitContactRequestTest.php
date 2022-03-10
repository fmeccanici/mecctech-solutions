<?php

namespace Tests\Feature\PortfolioManagement;

use Tests\TestCase;

class SubmitContactRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /** @test */
    public function it_should_return_status_ok(){
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
        self::assertEquals(200, $response->status());
    }
}
