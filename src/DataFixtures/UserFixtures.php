<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

	private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->encoder = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
		for($i=0;$i < 25;$i++) {
			// Crée une nouvelle entité
			$user = new User();
			// Donne des valeurs à ses attributs
			$user->setPseudo('user_'.$i);
			$user->setPassword($this->encoder->hashPassword($user, 'Anthony1234'));
			$user->setRoles(["ROLE_USER"]);
			// Enregistre dans la BDD (INSERT)
			$manager->persist($user);
		}

		$admin = new User();
		// Donne des valeurs à ses attributs
		$admin->setPseudo('Admin');
		$admin->setPassword($this->encoder->hashPassword($admin, 'Admin1234'));
		$admin->setRoles(["ROLE_ADMIN"]);
		// Enregistre dans la BDD (INSERT)
		$manager->persist($admin);



        $manager->flush();
    }
}
