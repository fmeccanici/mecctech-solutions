<?php

namespace App\CustomerRelationshipManagement\Domain\Customers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class Customer implements Arrayable
{
    private ?string $customerNumber;
    private string $firstName;
    private string $lastName;
    private string $email;

    /**
     * @param string|null $customerNumber
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(?string $customerNumber, string $firstName, string $lastName, string $email)
    {
        $this->customerNumber = $customerNumber;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function customerNumber(): ?string
    {
        return $this->customerNumber;
    }

    public function changeCustomerNumber(?string $customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function changeFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function changeLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function changeEmail(string $email)
    {
        $this->email = $email;
    }

    public function name(): string
    {
        return $this->firstName." ".$this->lastName;
    }

    public function toArray()
    {
        return [
            "customer_number" => $this->customerNumber,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "email" => $this->email
        ];
    }

    public function asArray(array $attributes)
    {
        $result = [];

        foreach ($attributes as $attribute)
        {
            $variableName = Str::camel($attribute);
            $result[$attribute] = $this->$variableName;
        }

        return $result;
    }
}
