<?php

namespace Estimations\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hd", type="integer")
     */
    private $hd;

    /**
     * @var integer
     *
     * @ORM\Column(name="velocity", type="integer")
     */
    private $velocity;

    /**
     * @var integer
     *
     * @ORM\Column(name="sprintTime", type="integer")
     */
    private $sprintTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="holidays", type="integer")
     */
    private $holidays;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientVisits", type="integer")
     */
    private $clientVisits;


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
}