<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;
use Estimations\Bundle\MainBundle\Services\BusinessDays;
use \DateTime;

class Estimate{
    public function __construct(BusinessDays $businessDays)
    {
        $this->businessDays = $businessDays;
    }

    public function estimateByHours(Project $project)
    {
        $minutesPerDay = $project->getHd() * 60;

        $remainingDays = $project->getRemainingMinutes() / 60 / $minutesPerDay;
        $remainingDays += $project->getClientVisits() + $project->getHolidays();

        $endDate = $this->businessDays->getEndDate(date("Y/m/d"), $remainingDays);

        return $endDate;
    }

    public function estimateBySprints(Project $project)
    {
        $project->calculateVelocity();

        $remainingSprints = $project->getAllRemainingSP() / $project->getVelocity();

        $remainingWeeks = ceil($remainingSprints) * $project->getSprintTime();

        $endDate = new DateTime();

        $endDate->modify("+".$remainingWeeks." weeks");

        return $endDate;
    }


}