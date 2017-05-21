<?php

namespace CarWash\Service;

use CarWash\Entity\Car;
use CarWash\Entity\Customer;
use CarWash\Entity\Job;
use CarWash\Notifier\NotifierInterface;
use CarWash\Repository\RepositoryInterface;

class CarWashService
{
    /**
     * @const int
     */
    const DEFAULT_SECONDS_TO_WASH = 1;

    /**
     * @param NotifierInterface   $notifier
     * @param RepositoryInterface $repository
     */
    public function __construct(NotifierInterface $notifier, RepositoryInterface $repository)
    {
        $this->notifier   = $notifier;
        $this->repository = $repository;
    }

    /**
     * @param Car      $car
     * @param Customer $customer 
     *
     * @return int $jobId
     */
    public function toWashCar(Car $car, Customer $customer)
    {
        sleep(self::DEFAULT_SECONDS_TO_WASH);
        $job = new Job($car, $customer);
        $this->repository->put($job);

        return $job->getId();
    }

    /**
     * @param int $jobId
     */
    public function washCompleted($jobId)
    {
        $job = $this->repository->findById($jobId);
        $this->notifier->notify($job);
    }
}
