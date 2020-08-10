<?php

namespace Users\UsersBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Commande;
use Users\UsersBundle\Entity\Users;
use Users\UsersBundle\Entity\UsersAddress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new Users();
        $user1->setUsername('nsk1703');
        $user1->setEmail('kevinsamuelndoum@gmail.com');
        $user1->setEnabled(1);
        $password1 = $this->encoder->encodePassword($user1, 'samuelGL170396');
        $user1->setPassword($password1);
        $manager->persist($user1);

        $user2 = new Users();
        $user2->setUsername('champion');
        $user2->setEmail('kndoum@yahoo.fr');
        $user2->setEnabled(1);
        $password2 = $this->encoder->encodePassword($user2, 'samuelMSI');
        $user2->setPassword($password2);
        $manager->persist($user2);

        $user3 = new Users();
        $user3->setUsername('nsk');
        $user3->setEmail('nskevin31@gmail.com');
        $user3->setEnabled(1);
        $password3 = $this->encoder->encodePassword($user3, 'samuelGL21');
        $user3->setPassword($password3);
        $manager->persist($user3);

        $user4 = new Users();
        $user4->setUsername('snk');
        $user4->setEmail('snkevin31@gmail.com');
        $user4->setEnabled(1);
        $password4 = $this->encoder->encodePassword($user4, 'samuelGL23');
        $user4->setPassword($password4);
        $manager->persist($user4);

        $user5 = new Users();
        $user5->setUsername('kns');
        $user5->setEmail('ksndoum@gmail.com');
        $user5->setEnabled(1);
        $password5 = $this->encoder->encodePassword($user5, 'samuelGL24');
        $user5->setPassword($password5);
        $manager->persist($user5);

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);

        $usersAddress1 = new UsersAddress();
        $usersAddress1->setNom('Ndoum');
        $usersAddress1->setPrenom('Samuel');
        $usersAddress1->setTelephone('690710915');
        $usersAddress1->SetAddresse('Bassa, PK13-MbouhangII');
        $usersAddress1->setCp('3306');
        $usersAddress1->setPays('Cameroun');
        $usersAddress1->setVille('Douala');
        $usersAddress1->setComplement('Face ancienne ecole Eppercam');
        $usersAddress1->setUsers($this->getReference('user1'));
        $manager->persist($usersAddress1);

        $usersAddress2 = new UsersAddress();
        $usersAddress2->setNom('Njock');
        $usersAddress2->setPrenom('Jacques');
        $usersAddress2->setTelephone('693724522');
        $usersAddress2->SetAddresse('Nyalla, Pariso');
        $usersAddress2->setCp('3310');
        $usersAddress2->setPays('Cameroun');
        $usersAddress2->setVille('Douala');
        $usersAddress2->setComplement('Apres Carrefour Container bleu');
        $usersAddress2->setUsers($this->getReference('user3'));
        $manager->persist($usersAddress2);

        //        Fixture de la table Commande -Debut-
        $commande1 = new Commande();
        $commande1->setValidate('1');
        $commande1->setDate(new \DateTime());
        $commande1->setReference('1');
        $commande1->setProducts(array('0' => array('1' => '2'),
            '1' => array('2' => '1'),
            '2' => array('4' => '3')
        ));
        $commande1->setUsers($this->getReference('user1'));
        $manager->persist($commande1);

        $commande2 = new Commande();
        $commande2->setValidate('1');
        $commande2->setDate(new \DateTime());
        $commande2->setReference('2');
        $commande2->setProducts(array('0' => array('1' => '2'),
            '1' => array('2' => '1'),
            '2' => array('4' => '3')
        ));
        $commande2->setUsers($this->getReference('user3'));
        $manager->persist($commande2);

        $manager->flush();
    }
}