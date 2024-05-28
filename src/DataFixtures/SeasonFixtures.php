<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
            $faker = Factory::create();

        for ($j = 1; $j <=10; $j++){
            for($i = 1; $i <= 5; $i++) {
                $season = new Season;
                $season->setNumber($faker->numberBetween(1, 5));
                $season->setYear($faker->numberBetween(1990, 2020));
                $season->setDescription($faker->paragraph(2));
                $program = $this->getReference('program_'. $j);
                $season->setProgram($program);
                $manager->persist($season);
                $this->addReference('program_'. $j. 'season_' . $i, $season);
            }
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