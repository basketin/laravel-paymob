<?php

namespace Basketin\Paymob\Configs;

class BillingData
{
    public function __construct(
        public $firstName,
        public $lastName,
        public $phoneNumber,
        public $email,
        public $city,
        public $country,
        public $state,
        public $postalCode,
        public $street,
        public $building = "0",
        public $apartment = "0",
        public $floor = "0",
        public $shippingMethod = "PKG",
    ) {
        //
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the value of country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get the value of state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the value of postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Get the value of street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the value of building
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Get the value of apartment
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * Get the value of floor
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Get the value of shippingMethod
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }
}
