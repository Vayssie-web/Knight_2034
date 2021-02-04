<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    Private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder; 
    }
    
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $kay = new User();
        $kay->setEmail('kay@gmail.com');
        $encodedPassword = $this->encoder->encodePassword($kay,'123456');
        $kay->setPassword($encodedPassword);
        $manager->persist($kay);

        $bohort = new User();
        $bohort->setEmail('bohort@gmail.com');
        $encodedPassword = $this->encoder->encodePassword($bohort,'123456');
        $bohort->setPassword($encodedPassword);
        $manager->persist($bohort);

        $lancelot = new User();
        $lancelot->setEmail('lancelot@gmail.com');
        $encodedPassword = $this->encoder->encodePassword($lancelot,'123456');
        $lancelot->setPassword($encodedPassword);
        $manager->persist($lancelot);

        $arthur = new User();
        $arthur->setEmail('arthur@gmail.com');
        $encodedPassword = $this->encoder->encodePassword($arthur,'123456');
        $arthur->setPassword($encodedPassword);
        $manager->persist($arthur);

        $manager->flush();
    }
}
