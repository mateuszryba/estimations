<?php

namespace Estimations\Bundle\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Estimations\Bundle\MainBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setName("Księgarnia internetowa");
        $project->setSprintTime(2);
        $project->setHolidays(5);
        $project->setClientVisits(2);
        $project->setHd(30);
        $project->setVelocity(44);
        $project->setRemaining1SP(20);
        $project->setRemaining2SP(20);
        $project->setRemaining3SP(28);
        $project->setRemaining5SP(40);
        $project->setRemaining8SP(20);
        $project->setRemaining13SP(10);

        $project2 = new Project();
        $project2->setName("Portal społecznościowy");
        $project2->setSprintTime(3);
        $project2->setHolidays(10);
        $project2->setClientVisits(20);
        $project2->setHd(24);
        $project2->setVelocity(30);
        $project2->setRemaining1SP(20);
        $project2->setRemaining2SP(10);
        $project2->setRemaining3SP(15);
        $project2->setRemaining5SP(25);
        $project2->setRemaining8SP(16);
        $project2->setRemaining13SP(6);

        $manager->persist($project);
        $manager->persist($project2);
        $manager->flush();

        $this->addReference('bookstore', $project);
        $this->addReference('social-network', $project2);

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}