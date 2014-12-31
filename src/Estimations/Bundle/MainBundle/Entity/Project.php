<?php

namespace Estimations\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Estimations\Bundle\MainBundle\Entity\Issue;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Project
{
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Estimations\Bundle\MainBundle\Entity\Issue", mappedBy="project")
     */
    protected $issues;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
    }

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
     * @ORM\Column(name="name", type="string", length=80)
     */
    protected $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hd", type="integer")
     */
    protected $hd;

    /**
     * @var integer
     *
     * @ORM\Column(name="velocity", type="integer")
     */
    protected $velocity;

    /**
     * @var integer
     *
     * @ORM\Column(name="sprintTime", type="integer")
     */
    protected $sprintTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="holidays", type="integer")
     */
    protected $holidays;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientVisits", type="integer")
     */
    protected $clientVisits;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining1SP", type="integer")
     */
    protected $remaining1SP;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining2SP", type="integer")
     */
    protected $remaining2SP;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining3SP", type="integer")
     */
    protected $remaining3SP;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining5SP", type="integer")
     */
    protected $remaining5SP;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining8SP", type="integer")
     */
    protected $remaining8SP;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining13SP", type="integer")
     */
    protected $remaining13SP;

    /**
     * @var float
     *
     * @ORM\Column(name="avg1sp", type="float", nullable=true)
     */
    protected $avg1SP;


    /**
     * @var float
     *
     * @ORM\Column(name="avg2sp", type="float", nullable=true)
     */
    protected $avg2SP;


    /**
     * @var float
     *
     * @ORM\Column(name="avg3sp", type="float", nullable=true)
     */
    protected $avg3SP;


    /**
     * @var float
     *
     * @ORM\Column(name="avg5sp", type="float", nullable=true)
     */
    protected $avg5SP;


    /**
     * @var float
     *
     * @ORM\Column(name="avg8sp", type="float", nullable=true)
     */
    protected $avg8SP;


    /**
     * @var float
     *
     * @ORM\Column(name="avg13sp", type="float", nullable=true)
     */
    protected $avg13SP;


    /**
     * @var datetime
     *
     * @ORM\Column(name="estimationByHours", type="datetime", nullable=true)
     */
    protected $estimationByHours;


    /**
     * @var datetime
     *
     * @ORM\Column(name="estimationBySprints", type="datetime", nullable=true)
     */
    protected $estimationBySprints;


    /**
     * @var integer
     *
     * @ORM\Column(name="statisticsSprints", type="integer")
     */
    protected $statisticsSprints;

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
     * Set name
     *
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hd
     *
     * @param integer $hd
     * @return Project
     */
    public function setHd($hd)
    {
        $this->hd = $hd;

        return $this;
    }

    /**
     * Get hd
     *
     * @return integer
     */
    public function getHd()
    {
        return $this->hd;
    }

    /**
     * Set velocity
     *
     * @param integer $velocity
     * @return Project
     */
    public function setVelocity($velocity)
    {
        $this->velocity = $velocity;

        return $this;
    }

    /**
     * Get velocity
     *
     * @return integer
     */
    public function getVelocity()
    {
        return $this->velocity;
    }

    /**
     * Set sprintTime
     *
     * @param integer $sprintTime
     * @return Project
     */
    public function setSprintTime($sprintTime)
    {
        $this->sprintTime = $sprintTime;

        return $this;
    }

    /**
     * Get sprintTime
     *
     * @return integer
     */
    public function getSprintTime()
    {
        return $this->sprintTime;
    }

    /**
     * Set holidays
     *
     * @param integer $holidays
     * @return Project
     */
    public function setHolidays($holidays)
    {
        $this->holidays = $holidays;

        return $this;
    }

    /**
     * Get holidays
     *
     * @return integer
     */
    public function getHolidays()
    {
        return $this->holidays;
    }

    /**
     * Set clientVisits
     *
     * @param integer $clientVisits
     * @return Project
     */
    public function setClientVisits($clientVisits)
    {
        $this->clientVisits = $clientVisits;

        return $this;
    }

    /**
     * Get clientVisits
     *
     * @return integer
     */
    public function getClientVisits()
    {
        return $this->clientVisits;
    }

    /**
     * Add single issue
     *
     * @param \Estimations\Bundle\MainBundle\Entity\Issue $issues
     * @return Project
     */
    public function addIssue(\Estimations\Bundle\MainBundle\Entity\Issue $issues)
    {
        $this->issues[] = $issues;

        return $this;
    }

    /**
     * Add issues
     *
     * @param \ArrayCollection $issues
     * @return Project
     */
    public function addIssues($issues)
    {
        $this->issues[] = $issues;

        return $this;
    }


    /**
     * Remove issues
     *
     * @param \Estimations\Bundle\MainBundle\Entity\Issue $issues
     */
    public function removeIssue(\Estimations\Bundle\MainBundle\Entity\Issue $issues)
    {
        $this->issues->removeElement($issues);
    }

    /**
     * Get issues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIssues()
    {
        return $this->issues;
    }


    /**
     * Set avg1SP
     *
     * @param string $avg1SP
     * @return Project
     */
    public function setAvg1SP($avg1SP)
    {
        $this->avg1SP = $avg1SP;

        return $this;
    }

    /**
     * Get avg1SP
     *
     * @return string
     */
    public function getAvg1SP()
    {
        return $this->avg1SP;
    }

    /**
     * Set avg2SP
     *
     * @param string $avg2SP
     * @return Project
     */
    public function setAvg2SP($avg2SP)
    {
        $this->avg2SP = $avg2SP;

        return $this;
    }

    /**
     * Get avg2SP
     *
     * @return string
     */
    public function getAvg2SP()
    {
        return $this->avg2SP;
    }

    /**
     * Set avg3SP
     *
     * @param string $avg3SP
     * @return Project
     */
    public function setAvg3SP($avg3SP)
    {
        $this->avg3SP = $avg3SP;

        return $this;
    }

    /**
     * Get avg3SP
     *
     * @return string
     */
    public function getAvg3SP()
    {
        return $this->avg3SP;
    }

    /**
     * Set avg5SP
     *
     * @param string $avg5SP
     * @return Project
     */
    public function setAvg5SP($avg5SP)
    {
        $this->avg5SP = $avg5SP;

        return $this;
    }

    /**
     * Get avg5SP
     *
     * @return string
     */
    public function getAvg5SP()
    {
        return $this->avg5SP;
    }

    /**
     * Set avg8SP
     *
     * @param string $avg8SP
     * @return Project
     */
    public function setAvg8SP($avg8SP)
    {
        $this->avg8SP = $avg8SP;

        return $this;
    }

    /**
     * Get avg8SP
     *
     * @return string
     */
    public function getAvg8SP()
    {
        return $this->avg8SP;
    }

    /**
     * Set avg13SP
     *
     * @param string $avg13SP
     * @return Project
     */
    public function setAvg13SP($avg13SP)
    {
        $this->avg13SP = $avg13SP;

        return $this;
    }

    /**
     * Get avg13SP
     *
     * @return string
     */
    public function getAvg13SP()
    {
        return $this->avg13SP;
    }


    /**
     * Sets all averages to 0
     *
     * @return $this
     */
    public function cleanAllAverages()
    {
        $this->avg1SP = 0.0;
        $this->avg2SP = 0.0;
        $this->avg3SP = 0.0;
        $this->avg5SP = 0.0;
        $this->avg8SP = 0.0;
        $this->avg13SP = 0.0;

        return $this;
    }

    /**
     * Set remaining1SP
     *
     * @param integer $remaining1SP
     * @return Project
     */
    public function setRemaining1SP($remaining1SP)
    {
        $this->remaining1SP = $remaining1SP;

        return $this;
    }

    /**
     * Get remaining1SP
     *
     * @return integer
     */
    public function getRemaining1SP()
    {
        return $this->remaining1SP;
    }

    /**
     * Set remaining2SP
     *
     * @param integer $remaining2SP
     * @return Project
     */
    public function setRemaining2SP($remaining2SP)
    {
        $this->remaining2SP = $remaining2SP;

        return $this;
    }

    /**
     * Get remaining2SP
     *
     * @return integer
     */
    public function getRemaining2SP()
    {
        return $this->remaining2SP;
    }

    /**
     * Set remaining3SP
     *
     * @param integer $remaining3SP
     * @return Project
     */
    public function setRemaining3SP($remaining3SP)
    {
        $this->remaining3SP = $remaining3SP;

        return $this;
    }

    /**
     * Get remaining3SP
     *
     * @return integer
     */
    public function getRemaining3SP()
    {
        return $this->remaining3SP;
    }

    /**
     * Set remaining5SP
     *
     * @param integer $remaining5SP
     * @return Project
     */
    public function setRemaining5SP($remaining5SP)
    {
        $this->remaining5SP = $remaining5SP;

        return $this;
    }

    /**
     * Get remaining5SP
     *
     * @return integer
     */
    public function getRemaining5SP()
    {
        return $this->remaining5SP;
    }

    /**
     * Set remaining8SP
     *
     * @param integer $remaining8SP
     * @return Project
     */
    public function setRemaining8SP($remaining8SP)
    {
        $this->remaining8SP = $remaining8SP;

        return $this;
    }

    /**
     * Get remaining8SP
     *
     * @return integer
     */
    public function getRemaining8SP()
    {
        return $this->remaining8SP;
    }

    /**
     * Set remaining13SP
     *
     * @param integer $remaining13SP
     * @return Project
     */
    public function setRemaining13SP($remaining13SP)
    {
        $this->remaining13SP = $remaining13SP;

        return $this;
    }

    /**
     * Get remaining13SP
     *
     * @return integer
     */
    public function getRemaining13SP()
    {
        return $this->remaining13SP;
    }

    /**
     * @return mixed
     */
    public function getLastSprint()
    {
        $sprints = $this->issues->map(function ($issue) {
            return $issue->getSprint();
        })->toArray();

        return max($sprints);
    }

    public function getSelectedSprintsIssues()
    {
        $lastSprint = $this->getLastSprint();

        $selectedIssues = array();

        foreach ($this->issues as $issue) {
            if ($issue->getSprint() > $lastSprint - $this->statisticsSprints) {
                $selectedIssues[] = $issue;
            }
        }

        return $selectedIssues;
    }

    public function calculateVelocity()
    {
        $numberOfStoryPoints = 0;

        foreach ($this->getSelectedSprintsIssues() as $issue) {
            $numberOfStoryPoints += $issue->getStoryPoints();
        }

        $this->velocity = $numberOfStoryPoints / $this->statisticsSprints;

        return $this;
    }

    public function getRemainingMinutes()
    {
        $remainingMinutes
            = $this->getAvg1SP() * $this->getRemaining1SP()
            + $this->getAvg2SP() * $this->getRemaining2SP()
            + $this->getAvg3SP() * $this->getRemaining3SP()
            + $this->getAvg5SP() * $this->getRemaining5SP()
            + $this->getAvg8SP() * $this->getRemaining8SP()
            + $this->getAvg13SP() * $this->getRemaining13SP();

        return $remainingMinutes;
    }

    /**
     * Set estimationByHours
     *
     * @param \DateTime $estimationByHours
     * @return Project
     */
    public function setEstimationByHours($estimationByHours)
    {
        $this->estimationByHours = $estimationByHours;

        return $this;
    }

    /**
     * Get estimationByHours
     *
     * @return \DateTime
     */
    public function getEstimationByHours()
    {
        return $this->estimationByHours;
    }

    /**
     * Set estimationBySprints
     *
     * @param \DateTime $estimationBySprints
     * @return Project
     */
    public function setEstimationBySprints($estimationBySprints)
    {
        $this->estimationBySprints = $estimationBySprints;

        return $this;
    }

    /**
     * Get estimationBySprints
     *
     * @return \DateTime
     */
    public function getEstimationBySprints()
    {
        return $this->estimationBySprints;
    }

    public function getAllRemainingSP()
    {
        $allRemainingSP =
            +$this->remaining1SP * 1
            + $this->remaining2SP * 2
            + $this->remaining3SP * 3
            + $this->remaining5SP * 5
            + $this->remaining8SP * 8
            + $this->remaining13SP * 13;

        return $allRemainingSP;
    }

    /**
     * Set statisticsSprints
     *
     * @param integer $statisticsSprints
     * @return Project
     */
    public function setStatisticsSprints($statisticsSprints)
    {
        $this->statisticsSprints = $statisticsSprints;

        return $this;
    }

    /**
     * Get statisticsSprints
     *
     * @return integer
     */
    public function getStatisticsSprints()
    {
        return $this->statisticsSprints;
    }
}
