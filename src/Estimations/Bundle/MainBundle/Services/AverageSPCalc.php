<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;

class AverageSPCalc
{
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

        foreach ($selectedIssues as $issue) {
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
        $averages = array();
        $empties = array();

        if (0 != $arrayOfAverages['c1']) {
            $averages['1'] = ($arrayOfAverages['1'] / (float)$arrayOfAverages['c1']);
        }
        else
        {
            $empties[] = 1;
        }
        if (0 != $arrayOfAverages['c2']) {
            $averages['2'] = ($arrayOfAverages['2'] / (float)$arrayOfAverages['c2']);
        }
        else
        {
            $empties[] = 2;
        }
        if (0 != $arrayOfAverages['c3']) {
            $averages['3'] = ($arrayOfAverages['3'] / (float)$arrayOfAverages['c3']);
        }
        else
        {
            $empties[] = 3;
        }
        if (0 != $arrayOfAverages['c5']) {
            $averages['5'] = ($arrayOfAverages['5'] / (float)$arrayOfAverages['c5']);
        }
        else
        {
            $empties[] = 5;
        }
        if (0 != $arrayOfAverages['c8']) {
            $averages['8'] = ($arrayOfAverages['8'] / (float)$arrayOfAverages['c8']);
        }
        else
        {
            $empties[] = 8;
        }
        if (0 != $arrayOfAverages['c13']) {
            $averages['13'] = ($arrayOfAverages['13'] / (float)$arrayOfAverages['c13']);
        }
        else
        {
            $empties[] = 13;
        }

        if(empty($averages)){
            return $project;
        }

        if(!empty($empties))
        {
            foreach($empties as $sp){
                reset($averages);
                $averages[$sp] = $sp * (current($averages) / key($averages));
            }
        }

        $project->setAvg1SP($averages['1']);
        $project->setAvg2SP($averages['2']);
        $project->setAvg3SP($averages['3']);
        $project->setAvg5SP($averages['5']);
        $project->setAvg8SP($averages['8']);
        $project->setAvg13SP($averages['13']);

        return $project;
    }
}