<?php

namespace CarWash\Entity;

class Job
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var Customer $customer
     */
    protected $customer;

    /**
     * @param Car      $car
     * @param Customer $customer
     */
    public function __construct(Car $car, Customer $customer)
    {
        $this->id  = uniqid();
        $this->car = $car;
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return boolean
     */
    public function hasCustomer(Customer $customer)
    {
        return ($customer->getDni() === $this->customer->getDni());
    }

    /**
     * @return int
     */
    public function __toString()
    {
        return $this->getId();
    }
}
