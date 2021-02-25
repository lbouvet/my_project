<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    /**
     * AppFixtures constructor.
     * @param $encoder {UserPasswordEncoderInterface}
     */
    public function __construct(UserPasswordEncoderInterface  $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        $user = new User();
        $user->setEmail('lbouvet@gmail.com');
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->encoder->encodePassword($user, '123456'));

        $manager->persist($user);

        $manager->flush();
    }
}
