<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
       
        $article = new Articles();
        $article->setTitle('Article 1');
        $article->setImage('Image 1');
        $article->setContent('Lorem Ipsum...');
        $article->setAuthor('Auteur 1');
        $article->setCategory($this->getReference(CategoryFixtures::CATEGORY));
        $manager->persist($article);
        
        $manager->flush();   
    }

    public function getDependencies(){
        return [
            CategoryFixtures::class
        ];
    }
}