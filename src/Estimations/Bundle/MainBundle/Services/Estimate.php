<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;
use Estimations\Bundle\MainBundle\Services\BusinessDays;
use \DateTime;

class Estimate
{
    public function __construct(BusinessDays $businessDays)
    {
        $this->businessDays = $businessDays;
    }

    public function estimateByHours(Project $project)
    {
        // work time of team per day in minutes
        $minutesPerDay = $project->getHd() * 60;

        // client visits in minutes(whole team involved), assumed: 1 client visit = 1 day
        $clientVisitsInMinutes = $project->getClientVisits() * $minutesPerDay;

        // employees holidays in minutes
        $holidaysInMinutes = $project->getHolidays() * 60;

        // local variable for remaining minutes to finish project
        $remainingMinutes = $project->getRemainingMinutes();

        // time spent of scrum events per sprint
        // 8h for 1 week sprints, 12h for 2 week and 3 week sprints, 16h for 1 month sprints
        // value in business days multipled by work time of team per day in minutes
        // so finally in minutes, that take time of whole team
        switch($project->getSprintTime()) {
            case 1:
                $timeOfScrumEventsPerSprint = (8 / 8) * $minutesPerDay;
                break;
            case 2:
                $timeOfScrumEventsPerSprint = (12 / 8) * $minutesPerDay;
                break;
            case 3:
                $timeOfScrumEventsPerSprint = (12 / 8) * $minutesPerDay;
                break;
            case 4:
                $timeOfScrumEventsPerSprint = (16 / 8) * $minutesPerDay;
                break;
            default:
                $timeOfScrumEventsPerSprint = (12 / 8) * $minutesPerDay;
                break;
        }

        $totalRemainingMinutes = $remainingMinutes + $holidaysInMinutes + $clientVisitsInMinutes;
        $remainingDays = $totalRemainingMinutes / $minutesPerDay;
        $remainingDaysWithScrumEvents = $remainingDays;

        // * 5 because of 5 working days per one week
        // calculate and update until dates will be the same
        do {
            $remainingDays = $remainingDaysWithScrumEvents;

            // how many sprints do we have left
            $remainingSprints = ceil($remainingDays / ($project->getSprintTime() * 5));
            echo"sprints";
            var_dump($remainingSprints);

            $scrumEventsInMinutes = $remainingSprints * $timeOfScrumEventsPerSprint;

            $totalRemainingMinutes =
                + $remainingMinutes
                + $holidaysInMinutes
                + $clientVisitsInMinutes
                + $scrumEventsInMinutes;

            $remainingDaysWithScrumEvents = $totalRemainingMinutes / $minutesPerDay;
        }
        while(($remainingDaysWithScrumEvents - $remainingDays) > 1);

        $endDate = $this->businessDays->getEndDate(date("Y/m/d"), $remainingDays);

        return $endDate;
    }

    public function estimateBySprints(Project $project)
    {
        $project->calculateVelocity();

        $remainingSprints = $project->getAllRemainingSP() / $project->getVelocity();

        $remainingWeeks = ceil($remainingSprints) * $project->getSprintTime();

        $endDate = new DateTime();

        $endDate->modify("+" . $remainingWeeks . " weeks");

        return $endDate;
    }


}