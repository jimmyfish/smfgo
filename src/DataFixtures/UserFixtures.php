<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('dito@tuta.io');
        $user->setPassword($this->encoder->encodePassword($user, 'faster'));
        $user->setUsername('ditolaksono');

        $manager->persist($user);

        $manager->flush();
    }
}
