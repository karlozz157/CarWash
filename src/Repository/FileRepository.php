<?php

namespace CarWash\Repository;

use CarWash\Entity\Customer;
use CarWash\Entity\Job;

class FileRepository implements RepositoryInterface
{
    /**
     * @const string
     */
    const JOIN_DIR_WITH_FILE = '%s/%s';

    /**
     * @var string $storageDir
     */
    protected $storageDir;

    public function __construct()
    {
        $this->storegeDir = __FILE__ . '../../storage';

        if (!file_exists($this->storageDir)) {
            mkdir($this->storegeDir);
        }
    }

    /**
     * @param Job $job
     *
     * @return $this
     */
    public function put(Job $job)
    {
        $filename = sprintf(self::JOIN_DIR_WITH_FILE, $this->storageDir . $job->getId());

        if (false === file_put_contents($filename, serialize($job))) {
            throw new \Exception('An error occurred while saving to file');
        }

        return $this;
    }

    /**
     * @param int $jobId
     *
     * @return Job
     */
    public function findById($jobId)
    {
        $filename = sprintf(self::JOIN_DIR_WITH_FILE, $this->storegeDir, $jobId);

        if (false !== $content = file_get_contents($filename)) {
            return unserialize($content);
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
        //TODO
    }
}
