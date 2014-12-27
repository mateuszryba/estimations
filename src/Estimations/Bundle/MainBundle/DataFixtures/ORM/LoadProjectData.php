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
        $project->setRemainingSP(570);

        $project2 = new Project();
        $project2->setName("Portal społecznościowy");
        $project2->setSprintTime(3);
        $project2->setHolidays(10);
        $project2->setClientVisits(20);
        $project2->setHd(24);
        $project2->setVelocity(30);
        $project2->setRemainingSP(700);

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