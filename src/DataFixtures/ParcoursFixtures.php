<?php

namespace App\DataFixtures;

use App\Entity\Parcours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParcoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 25; $i++) {

            $parcours = (new Parcours())
                ->setNom('parcours_' . $i)
                ->setDescription(
                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Ut ipsam in amet consectetur qui repudiandae distinctio provident 
                    corporis pariatur ratione magnam sed velit, consequuntur aliquam? Enim 
                    repudiandae quam facere perspiciatis!"
                );
            $this->addReference('parcours_' . $i, $parcours);
            $manager->persist($parcours);
        }
        $manager->flush();
    }
}
