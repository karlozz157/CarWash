<?php

namespace CarWash\Repository;

use CarWash\Entity\Customer;
use CarWash\Entity\Job;

interface RepositoryInterface
{
    /**
     * @param Job $job
     *
     * @return $this
     */
    public function put(Job $job);

    /**
     * @param int $jobId
     *
     * @return Job
     */
    public function findById($jobId);

    /**
     * @param Customer $customer
     *
     * @return Job
     */
    public function findByCustomer(Customer $customer);
}
