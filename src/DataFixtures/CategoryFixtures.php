<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 25; $i++) {
            $category = (new Category())
                ->setCatName('categorie_' . $i);
            $this->addReference('categorie_' . $i, $category);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
