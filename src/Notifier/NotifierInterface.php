<?php

namespace CarWash\Notifier;

use CarWash\Entity\Job;

interface NotifierInterface
{
    /**
     * @param Job $job
     *
     * @return void
     */
    public function notify(Job $job);
}
