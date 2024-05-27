<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EPISODE = [
        
        [
            'title' => 'Days Gone Bye',
            'number' => 1,
            'synopsis' => "Le shérif adjoint Rick Grimes se réveille d'un coma et cherche sa famille dans un monde ravagé par les morts-vivants.",
            'season' => 1,
            'reference' => 'Walking_Dead',
        ],
        
        [
            'title' => 'Guts',
            'number' => 2,
            'synopsis' => "In Atlanta, Rick is rescued by a group of survivors, but they soon find themselves trapped inside a department store surrounded by walkers.",
            'season' => 1,
            'reference' => 'Walking_Dead',
        ],

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::EPISODE as $episodeData) {
            $episode = new Episode();
            $episode->setTitle($episodeData['title']);
            $episode->setNumber($episodeData['number']);
            $episode->setSynopsis($episodeData['synopsis']);
            
            $seasonReference = $episodeData['reference'] . '_season' . $episodeData['season'];
            $season = $this->getReference($seasonReference);
            $episode->setSeason($season);
            $manager->persist($episode);

            $this->addReference($episodeData['reference'] . '_season_' . $episodeData['season'] . '_episode_' . $episodeData['number'], $episode);
        }

        // Exécute la persistance en base de données
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