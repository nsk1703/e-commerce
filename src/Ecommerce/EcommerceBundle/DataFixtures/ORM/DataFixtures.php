<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Commande;
use Ecommerce\EcommerceBundle\Entity\Media;
use Ecommerce\EcommerceBundle\Entity\Categories;
use Ecommerce\EcommerceBundle\Entity\Tva;
use Ecommerce\EcommerceBundle\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
//        Fixture de la table Media -Debut-
        $media1 = new Media();
        $media1->setPath('uploads/Dell.jpg');
        $media1->setAlt('Dell Inspiron');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('uploads/hp1.jpg');
        $media2->setAlt('hp pavillon');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('uploads/Toshiba.jpg');
        $media3->setAlt('Toshiba express');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setPath('uploads/Asus.jpg');
        $media4->setAlt('Asus Cordo');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setPath('uploads/Compaq.jpg');
        $media5->setAlt('Compaq desert');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setPath('uploads/Toshiba1.jpg');
        $media6->setAlt('Toshiba monster');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setPath('uploads/Acer.jpg');
        $media7->setAlt('Acer probook');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setPath('uploads/HP.jpg');
        $media8->setAlt('hp thinkpad');
        $manager->persist($media8);

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
//        Fixture de la table Media -Fin-

//        Fixture de la table Categories -Debut-
        $category1 = new Categories();
        $category1->setNom('Computer');
        $category1->setImage($this->getReference('media1'));
        $manager->persist($category1);

        $category2 = new Categories();
        $category2->setNom('Imprimantes');
        $category2->setImage($this->getReference('media2'));
        $manager->persist($category2);

        $this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
//        Fixture de la table Categories -Fin-

//        Fixture de la table Tva -Debut-
        $tva1 = new Tva();
        $tva1->setMultiplicate('0.982');
        $tva1->setNom('TVA 1.75%');
        $tva1->setValeur('1.75');
        $manager->persist($tva1);

        $tva2 = new Tva();
        $tva2->setMultiplicate('0.832');
        $tva2->setNom('TVA 20%');
        $tva2->setValeur('20');
        $manager->persist($tva2);

        $this->addReference('tva1', $tva1);
        $this->addReference('tva2', $tva2);
//        Fixture de la table Tva -Fin-

//        Fixture de la table Products -Debut-
        $product1 = new Products();
        $product1->setName('hp ThinkPad');
        $product1->setDescription('Corei3, 2.60Ghz, HDD 500Go, Ram 4Go');
        $product1->setPrice('300000');
        $product1->setAvailable('1');
        $product1->setCategory($this->getReference('category1'));
        $product1->setImage($this->getReference('media8'));
        $product1->setTva($this->getReference('tva2'));
        $manager->persist($product1);

        $product2 = new Products();
        $product2->setName('Toshiba');
        $product2->setDescription('Core2Duo, 2.0Ghz, HDD 300Go, Ram 4Go');
        $product2->setPrice('200000');
        $product2->setAvailable('1');
        $product2->setCategory($this->getReference('category1'));
        $product2->setImage($this->getReference('media6'));
        $product2->setTva($this->getReference('tva1'));
        $manager->persist($product2);

        $product3 = new Products();
        $product3->setName('Compaq');
        $product3->setDescription('Pentium4 1.60Ghz, HDD 150Go, Ram 2Go');
        $product3->setPrice('150000');
        $product3->setAvailable('1');
        $product3->setCategory($this->getReference('category1'));
        $product3->setImage($this->getReference('media5'));
        $product3->setTva($this->getReference('tva2'));
        $manager->persist($product3);

        $product4 = new Products();
        $product4->setName('Acer Aspire');
        $product4->setDescription('Corei7 3.0Ghz, HDD 1Tera, Ram 8Go');
        $product4->setPrice('700000');
        $product4->setAvailable('1');
        $product4->setCategory($this->getReference('category1'));
        $product4->setImage($this->getReference('media7'));
        $product4->setTva($this->getReference('tva2'));
        $manager->persist($product4);

        $product5 = new Products();
        $product5->setName('Dell inspiron');
        $product5->setDescription('corei5 2.80Ghz, HDD 600Go, Ram 6Go');
        $product5->setPrice('500000');
        $product5->setAvailable('1');
        $product5->setCategory($this->getReference('category1'));
        $product5->setImage($this->getReference('media1'));
        $product5->setTva($this->getReference('tva2'));
        $manager->persist($product5);

        $product6 = new Products();
        $product6->setName('Asus');
        $product6->setDescription('corei3 2.30Ghz, HDD 400Go, Ram 4Go');
        $product6->setPrice('250000');
        $product6->setAvailable('1');
        $product6->setCategory($this->getReference('category1'));
        $product6->setImage($this->getReference('media4'));
        $product6->setTva($this->getReference('tva1'));
        $manager->persist($product6);
//        Fixture de la table Products -Fin-

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