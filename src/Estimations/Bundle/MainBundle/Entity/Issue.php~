<?php

namespace Estimations\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Estimations\Bundle\MainBundle\Entity\Project;

/**
 * Issue
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Issue
{
    /**
     * @var Project
     *
     * @ORM\ManyToOne(targetEntity="Estimations\Bundle\MainBundle\Entity\Project", inversedBy="issues")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="issueKey", type="string", length=20)
     */
    protected $issueKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="timeSpent", type="integer")
     */
    protected $timeSpent;

    /**
     * @var integer
     *
     * @ORM\Column(name="storyPoints", type="integer")
     */
    protected $storyPoints;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set issueKey
     *
     * @param string $issueKey
     * @return Issue
     */
    public function setIssueKey($issueKey)
    {
        $this->issueKey = $issueKey;

        return $this;
    }

    /**
     * Get issueKey
     *
     * @return string 
     */
    public function getIssueKey()
    {
        return $this->issueKey;
    }

    /**
     * Set timeSpent
     *
     * @param integer $timeSpent
     * @return Issue
     */
    public function setTimeSpent($timeSpent)
    {
        $this->timeSpent = $timeSpent;

        return $this;
    }

    /**
     * Get timeSpent
     *
     * @return integer 
     */
    public function getTimeSpent()
    {
        return $this->timeSpent;
    }

    /**
     * Set storyPoints
     *
     * @param integer $storyPoints
     * @return Issue
     */
    public function setStoryPoints($storyPoints)
    {
        $this->storyPoints = $storyPoints;

        return $this;
    }

    /**
     * Get storyPoints
     *
     * @return integer 
     */
    public function getStoryPoints()
    {
        return $this->storyPoints;
    }

    /**
     * Set project
     *
     * @param \Estimations\Bundle\MainBundle\Entity\Project $project
     * @return Issue
     */
    public function setProject(\Estimations\Bundle\MainBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Estimations\Bundle\MainBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
