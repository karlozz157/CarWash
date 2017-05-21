<?php

namespace CarWash\Notifier;

use CarWash\Entity\Job;

class ConsoleNotifier implements NotifierInterface
{
    /**
     * @param Job $job
     */
    public function notify(Job $job)
    {
        echo sprintf('%sHola %s! Tu %s ya está listo!', PHP_EOL, $job->getCustomer()->getName(), $job->getCar()->getModel());
        echo PHP_EOL;
    }
}
