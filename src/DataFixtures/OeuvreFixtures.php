<?php

namespace App\DataFixtures;

use App\Entity\Oeuvre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OeuvreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 25; $i++) {
            $oeuvre = (new Oeuvre())
                ->setNom('oeuvre_' . $i)
                ->setDescriptionO("Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Ut ipsam in amet consectetur qui repudiandae distinctio provident 
                corporis pariatur ratione magnam sed velit, consequuntur aliquam? Enim 
                repudiandae quam facere perspiciatis!")
                ->setArtiste("Artiste" . $i)
                ->setCoordoneeLat("X 566")
                ->setCoordoneeLon("Y 57S")
                ->setPhoto("https://picsum.photos/500/500")
                ->setAltImg("rien")
                ->setAdresse("adresse " . $i)
                ->setRelaCat($this->getReference("categorie_" . $i))
                ->setRelaOeuvre($this->getReference("parcours_" . $i));
            $manager->persist($oeuvre);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            ParcoursFixtures::class
        ];
    }
}
