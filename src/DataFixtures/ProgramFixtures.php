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
            'reference' => 'Walking_Dead'
        ],
        [
            'title' => 'The Expanse',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
            'reference' => 'The_expanse'
        ],
        [
            'title' => 'Titre 3',
            'synopsis' => 'some texte',
            'category' => 'category_Action',
            'reference' => 'placeholder'
        ],

     ];


    public function load(ObjectManager $manager)
    {

        foreach ($this::PROGRAMS as $programData){
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSynopsis($programData['synopsis']);
            $program->setPoster('');
            $category = $this->getReference($programData['category']);
            $program->setCategory($category);
            $manager->persist($program);
            $this->addReference($programData['reference'], $program);
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