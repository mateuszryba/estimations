<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;

class AverageSPCalc{
    public function __construct()
    {

    }

    public function calculateAverages($project)
    {
        $project->cleanAllAverages();

        $arrayOfAverages = [
            '1' => 0.0,
            '2' => 0.0,
            '3' => 0.0,
            '5' => 0.0,
            '8' => 0.0,
            '13' => 0.0,
            'c1' => 0,
            'c2' => 0,
            'c3' => 0,
            'c5' => 0,
            'c8' => 0,
            'c13' => 0,
        ];

        $selectedIssues = $project->getSelectedSprintsIssues();

        foreach($selectedIssues as $issue)
        {
            switch ($issue->getStoryPoints()) {
                case 1:
                    $arrayOfAverages['1'] += $issue->getTimeSpent();
                    $arrayOfAverages['c1']++;
                    break;

                case 2:
                    $arrayOfAverages['2'] += $issue->getTimeSpent();
                    $arrayOfAverages['c2']++;
                    break;
                case 3:
                    $arrayOfAverages['3'] += $issue->getTimeSpent();
                    $arrayOfAverages['c3']++;
                    break;
                case 5:
                    $arrayOfAverages['5'] += $issue->getTimeSpent();
                    $arrayOfAverages['c5']++;
                    break;
                case 8:
                    $arrayOfAverages['8'] += $issue->getTimeSpent();
                    $arrayOfAverages['c8']++;
                    break;
                case 13:
                    $arrayOfAverages['13'] += $issue->getTimeSpent();
                    $arrayOfAverages['c13']++;
                    break;
            }
        }

        $this->assignAveragesToProject($project, $arrayOfAverages);

        return $project;
    }

    /**
     *
     * @param Project $project
     * @param array $arrayOfAverages
     * @return Project
     */
    protected function assignAveragesToProject(Project $project, array $arrayOfAverages)
    {
        if(0 != $arrayOfAverages['c1']){
            $project->setAvg1SP($arrayOfAverages['1']/(float)$arrayOfAverages['c1']);
        }
        if(0 != $arrayOfAverages['c2']){
            $project->setAvg2SP($arrayOfAverages['2']/(float)$arrayOfAverages['c2']);
        }
        if(0 != $arrayOfAverages['c3']){
            $project->setAvg3SP($arrayOfAverages['3']/(float)$arrayOfAverages['c3']);
        }
        if(0 != $arrayOfAverages['c5']){
            $project->setAvg5SP($arrayOfAverages['5']/(float)$arrayOfAverages['c5']);
        }
        if(0 != $arrayOfAverages['c8']){
            $project->setAvg8SP($arrayOfAverages['8']/(float)$arrayOfAverages['c8']);
        }
        if(0 != $arrayOfAverages['c13']){
            $project->setAvg13SP($arrayOfAverages['13']/(float)$arrayOfAverages['c13']);
        }

        return $project;
    }
}