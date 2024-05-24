<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        [
            'title' => 'Walking Dead',
            'synopsis' => 'Des zombies envahissent la terre.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Titre 2',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Titre 3',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Titre 4',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Titre 5',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Titre 6',
            'synopsis' => 'some texte',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Titre 7',
            'synopsis' => 'some texte',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Titre 8',
            'synopsis' => 'some texte',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Titre 9',
            'synopsis' => 'some texte',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Titre 10',
            'synopsis' => 'some texte',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Titre 11',
            'synopsis' => 'some texte',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Titre 12',
            'synopsis' => 'some texte',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Titre 13',
            'synopsis' => 'some texte',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Titre 14',
            'synopsis' => 'some texte',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Titre 15',
            'synopsis' => 'some texte',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Titre 16',
            'synopsis' => 'some texte',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Titre 17',
            'synopsis' => 'some texte',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Titre 18',
            'synopsis' => 'some texte',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Titre 19',
            'synopsis' => 'some texte',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Titre 20',
            'synopsis' => 'some texte',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Titre 21',
            'synopsis' => 'some texte',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Titre 22',
            'synopsis' => 'some texte',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Titre 23',
            'synopsis' => 'some texte',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Titre 24',
            'synopsis' => 'some texte',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Titre 25',
            'synopsis' => 'some texte',
            'category' => 'category_Horreur',
        ],
        
     ];


    public function load(ObjectManager $manager)
    {
        // $data = array_map(self::PROGRAMS);

        foreach ($this::PROGRAMS as $programData){
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSynopsis($programData['synopsis']);
            $program->setPoster('');
            $category = $this->getReference($programData['category']);
            $program->setCategory($category);
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }


}