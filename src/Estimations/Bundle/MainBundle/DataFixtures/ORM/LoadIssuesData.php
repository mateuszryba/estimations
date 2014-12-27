<?php

namespace Estimations\Bundle\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Entity\Issue;

class LoadIssueData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        /**
         *
         * Project Bookstore
         *
         */
        $bookstore1 = new Issue();
        $bookstore1->setProject($this->getReference('bookstore'));
        $bookstore1->setIssueKey('BS-1');
        $bookstore1->setStoryPoints(8);
        $bookstore1->setTimeSpent(42);

        $bookstore2 = new Issue();
        $bookstore2->setProject($this->getReference('bookstore'));
        $bookstore2->setIssueKey('BS-2');
        $bookstore2->setStoryPoints(5);
        $bookstore2->setTimeSpent(24);

        $bookstore3 = new Issue();
        $bookstore3->setProject($this->getReference('bookstore'));
        $bookstore3->setIssueKey('BS-3');
        $bookstore3->setStoryPoints(3);
        $bookstore3->setTimeSpent(11);

        $bookstore4 = new Issue();
        $bookstore4->setProject($this->getReference('bookstore'));
        $bookstore4->setIssueKey('BS-4');
        $bookstore4->setStoryPoints(2);
        $bookstore4->setTimeSpent(5);

        $bookstore5 = new Issue();
        $bookstore5->setProject($this->getReference('bookstore'));
        $bookstore5->setIssueKey('BS-5');
        $bookstore5->setStoryPoints(1);
        $bookstore5->setTimeSpent(1);

        $bookstore6 = new Issue();
        $bookstore6->setProject($this->getReference('bookstore'));
        $bookstore6->setIssueKey('BS-6');
        $bookstore6->setStoryPoints(3);
        $bookstore6->setTimeSpent(7);

        $bookstore7 = new Issue();
        $bookstore7->setProject($this->getReference('bookstore'));
        $bookstore7->setIssueKey('BS-7');
        $bookstore7->setStoryPoints(5);
        $bookstore7->setTimeSpent(19);

        $bookstore8 = new Issue();
        $bookstore8->setProject($this->getReference('bookstore'));
        $bookstore8->setIssueKey('BS-8');
        $bookstore8->setStoryPoints(1);
        $bookstore8->setTimeSpent(2);

        $bookstore9 = new Issue();
        $bookstore9->setProject($this->getReference('bookstore'));
        $bookstore9->setIssueKey('BS-9');
        $bookstore9->setStoryPoints(3);
        $bookstore9->setTimeSpent(13);

        $bookstore10 = new Issue();
        $bookstore10->setProject($this->getReference('bookstore'));
        $bookstore10->setIssueKey('BS-10');
        $bookstore10->setStoryPoints(8);
        $bookstore10->setTimeSpent(65);

        $bookstore11 = new Issue();
        $bookstore11->setProject($this->getReference('bookstore'));
        $bookstore11->setIssueKey('BS-11');
        $bookstore11->setStoryPoints(2);
        $bookstore11->setTimeSpent(6);

        $bookstore12 = new Issue();
        $bookstore12->setProject($this->getReference('bookstore'));
        $bookstore12->setIssueKey('BS-12');
        $bookstore12->setStoryPoints(5);
        $bookstore12->setTimeSpent(17);

        $manager->persist($bookstore1);
        $manager->persist($bookstore2);
        $manager->persist($bookstore3);
        $manager->persist($bookstore4);
        $manager->persist($bookstore5);
        $manager->persist($bookstore6);
        $manager->persist($bookstore7);
        $manager->persist($bookstore8);
        $manager->persist($bookstore9);
        $manager->persist($bookstore10);
        $manager->persist($bookstore11);
        $manager->persist($bookstore12);

        /**
         *
         * Project social network
         *
         */

        $socialNetwork1 = new Issue();
        $socialNetwork1->setProject($this->getReference('social-network'));
        $socialNetwork1->setIssueKey('SC-1');
        $socialNetwork1->setStoryPoints(8);
        $socialNetwork1->setTimeSpent(76);

        $socialNetwork2 = new Issue();
        $socialNetwork2->setProject($this->getReference('social-network'));
        $socialNetwork2->setIssueKey('SC-2');
        $socialNetwork2->setStoryPoints(5);
        $socialNetwork2->setTimeSpent(41);

        $socialNetwork3 = new Issue();
        $socialNetwork3->setProject($this->getReference('social-network'));
        $socialNetwork3->setIssueKey('SC-3');
        $socialNetwork3->setStoryPoints(3);
        $socialNetwork3->setTimeSpent(18);

        $socialNetwork4 = new Issue();
        $socialNetwork4->setProject($this->getReference('social-network'));
        $socialNetwork4->setIssueKey('SC-4');
        $socialNetwork4->setStoryPoints(2);
        $socialNetwork4->setTimeSpent(10);

        $socialNetwork5 = new Issue();
        $socialNetwork5->setProject($this->getReference('social-network'));
        $socialNetwork5->setIssueKey('SC-5');
        $socialNetwork5->setStoryPoints(1);
        $socialNetwork5->setTimeSpent(4);

        $socialNetwork6 = new Issue();
        $socialNetwork6->setProject($this->getReference('social-network'));
        $socialNetwork6->setIssueKey('SC-6');
        $socialNetwork6->setStoryPoints(3);
        $socialNetwork6->setTimeSpent(25);

        $socialNetwork7 = new Issue();
        $socialNetwork7->setProject($this->getReference('social-network'));
        $socialNetwork7->setIssueKey('SC-7');
        $socialNetwork7->setStoryPoints(5);
        $socialNetwork7->setTimeSpent(30);

        $socialNetwork8 = new Issue();
        $socialNetwork8->setProject($this->getReference('social-network'));
        $socialNetwork8->setIssueKey('SC-8');
        $socialNetwork8->setStoryPoints(1);
        $socialNetwork8->setTimeSpent(2);

        $socialNetwork9 = new Issue();
        $socialNetwork9->setProject($this->getReference('social-network'));
        $socialNetwork9->setIssueKey('SC-9');
        $socialNetwork9->setStoryPoints(3);
        $socialNetwork9->setTimeSpent(13);

        $socialNetwork10 = new Issue();
        $socialNetwork10->setProject($this->getReference('social-network'));
        $socialNetwork10->setIssueKey('SC-10');
        $socialNetwork10->setStoryPoints(8);
        $socialNetwork10->setTimeSpent(55);

        $socialNetwork11 = new Issue();
        $socialNetwork11->setProject($this->getReference('social-network'));
        $socialNetwork11->setIssueKey('SC-11');
        $socialNetwork11->setStoryPoints(2);
        $socialNetwork11->setTimeSpent(10);

        $socialNetwork12 = new Issue();
        $socialNetwork12->setProject($this->getReference('social-network'));
        $socialNetwork12->setIssueKey('SC-12');
        $socialNetwork12->setStoryPoints(5);
        $socialNetwork12->setTimeSpent(41);

        $manager->persist($socialNetwork1);
        $manager->persist($socialNetwork2);
        $manager->persist($socialNetwork3);
        $manager->persist($socialNetwork4);
        $manager->persist($socialNetwork5);
        $manager->persist($socialNetwork6);
        $manager->persist($socialNetwork7);
        $manager->persist($socialNetwork8);
        $manager->persist($socialNetwork9);
        $manager->persist($socialNetwork10);
        $manager->persist($socialNetwork11);
        $manager->persist($socialNetwork12);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}