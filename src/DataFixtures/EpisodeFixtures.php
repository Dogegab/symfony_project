<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
            $faker = Factory::create();
    
    for ($k = 1; $k <=10; $k++){     
        for ($j = 1; $j <=5; $j++){
            for($i = 1; $i <= 10; $i++) {
                $episode = new Episode;
                $episode->setTitle($faker->words(3, true));
                $episode->setNumber($faker->numberBetween(1, 10));
                $episode->setSynopsis($faker->paragraph(2));
                $season = $this->getReference('program_'.$k.'season_'.$j);
                $episode->setSeason($season);
                $manager->persist($episode);
                $this->addReference('program_'.$k.'season_'.$j.'episode_' . $i, $episode);
            }
        }
    }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}