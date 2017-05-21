<?php

namespace CarWash\Repository;

use CarWash\Entity\Customer;
use CarWash\Entity\Job;

class MemoryRepository implements RepositoryInterface
{
    /**
     * @var array $jobs
     */
    protected $jobs;

    public function __construct()
    {
        $this->jobs = [];
    }

    /**
     * @param Job $job
     *
     * @return $this
     */
    public function put(Job $job)
    {
        $this->jobs[$job->getId()] = $job;

        return $this;
    }

    /**
     * @param int $jobId
     *
     * @return Job
     */
    public function findById($jobId)
    {
        if ($stored = $this->jobs[$jobId]) {
            return $stored;
        }

        throw new \Exception(sprintf('Job with id "%s" doesn\'t exist!', $jobId));
    }

    /**
     * @param Customer $customer
     *
     * @return Job
     */
    public function findByCustomer(Customer $customer)
    {
        foreach ($this->jobs as $job) {
            if ($job->hasCustomer($customer)) {
                return $job;
            }
        }

        throw new \Exception(sprintf('Customer "%s" doesn\'t exist!', $customer));
    }
}
