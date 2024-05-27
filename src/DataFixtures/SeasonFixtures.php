<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const SEASONS = [
        [
            'number' => 1,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 2,
            'year' => 2012,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 3,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 4,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 5,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 6,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 7,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 8,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 9,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 10,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],
        [
            'number' => 11,
            'year' => 2010,
            'description' => '',
            'reference' => 'Walking_Dead',
        ],

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::SEASONS as $seasonData) {
            $season = new Season();
            $season->setNumber($seasonData['number']);
            $season->setYear($seasonData['year']);
            $season->setDescription($seasonData['description']);
            
            $program = $this->getReference($seasonData['reference']);
            $season->setProgram($program);

            $manager->persist($season);

            $this->addReference($seasonData['reference'] . '_season'. $seasonData['number'], $season);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}