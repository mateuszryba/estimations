<?php

namespace Estimations\Bundle\MainBundle\Services;

use Estimations\Bundle\MainBundle\Entity\Issue;
use Estimations\Bundle\MainBundle\Entity\Project;

class Importer
{
    public function __construct()
    {
    }

    public function importIssuesFromXls($file, Project $project)
    {
        $reader = new \EasyCSV\Reader($file);
        $issues = array();

        while ($row = $reader->getRow()) {
            $issue = new Issue();
            $values = explode(";", $row['Key;TimeSpent;Story Points;Sprint']);
            $issue->setIssueKey($values['0']);
            $issue->setTimeSpent($values['1']);
            $issue->setStoryPoints($values['2']);
            $issue->setSprint($values['3']);
            $issue->setProject($project);
            $issues[] = $issue;
        }

        return ($issues);
    }
}
