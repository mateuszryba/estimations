<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;
use Estimations\Bundle\MainBundle\Services\BusinessDays;

class Estimate{
    public function __construct(BusinessDays $businessDays)
    {
        $this->businessDays = $businessDays;
    }

    public function estimateByHours(Project $project)
    {
        $minutesPerDay = $project->getHd() * 60;

        $remainingDays = $project->getRemainingMinutes() / $minutesPerDay;

        $endDate = $this->businessDays->getEndDate(date("Y/m/d"), $remainingDays);

        return $endDate;
    }


}