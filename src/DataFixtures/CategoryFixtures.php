<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = 'CATEGORY';

    public function load(ObjectManager $manager) : void
    {
        $category = new Category();
        $category->setName('Animation');
        $this->setReference(self::CATEGORY, $category);
        $manager->persist($category);

        // create 20 categories
        for ($i = 1; $i <= 10; $i++) {
            $category = new Category();
            $category->setName('Catégorie '.$i);
            $manager->persist($category);
        }

        $manager->flush();    
    }
}