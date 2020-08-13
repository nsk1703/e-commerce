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
//        Computers
        $media1 = new Media();
        $media1->setPath('/uploads/Dell.jpg');
        $media1->setAlt('Dell Inspiron');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('/uploads/hp1.jpg');
        $media2->setAlt('hp pavillon');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('/uploads/Toshiba.jpg');
        $media3->setAlt('Toshiba express');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setPath('/uploads/Asus.jpg');
        $media4->setAlt('Asus Cordo');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setPath('/uploads/MacOS.jpg');
        $media5->setAlt('Mac PC');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setPath('/uploads/Toshiba1.jpg');
        $media6->setAlt('Toshiba monster');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setPath('/uploads/Acer.jpg');
        $media7->setAlt('Acer Spin');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setPath('/uploads/HP.jpg');
        $media8->setAlt('hp thinkpad');
        $manager->persist($media8);

        $media9 = new Media();
        $media9->setPath('/uploads/Acer_Swift.jpg');
        $media9->setAlt('Acer Swift');
        $manager->persist($media9);

//        Printers
        $media10 = new Media();
        $media10->setPath('/uploads/brother.jpg');
        $media10->setAlt('Brother printer');
        $manager->persist($media10);

        $media11 = new Media();
        $media11->setPath('/uploads/canon1.jpg');
        $media11->setAlt('Canon Pixma MG 2555S');
        $manager->persist($media11);

        $media12 = new Media();
        $media12->setPath('/uploads/canon2.jpg');
        $media12->setAlt('i-SENSYS LBP710Cxr');
        $manager->persist($media12);

        $media13 = new Media();
        $media13->setPath('/uploads/Epson1.jpg');
        $media13->setAlt('Epson Expression Home XP-4100');
        $manager->persist($media13);

        $media14 = new Media();
        $media14->setPath('/uploads/hpPrint1.jpg');
        $media14->setAlt('LaserJet Pro MFP');
        $manager->persist($media14);

        $media15 = new Media();
        $media15->setPath('/uploads/hpPrint2.jpg');
        $media15->setAlt('HP DeskJet 2620');
        $manager->persist($media15);

//        Phones
        $media16 = new Media();
        $media16->setPath('/uploads/itel2.jpg');
        $media16->setAlt('itel A46 (Fiery Red)');
        $manager->persist($media16);

        $media17 = new Media();
        $media17->setPath('/uploads/itel_A25_Pro.jpg');
        $media17->setAlt('itel A25 Pro - face unlock -PTA Approved ');
        $manager->persist($media17);

        $media18 = new Media();
        $media18->setPath('/uploads/itelit2171.jpg');
        $media18->setAlt('Itel It2171 1.8 (Dark Blue)');
        $manager->persist($media18);

        $media19 = new Media();
        $media19->setPath('/uploads/SamsungA70.jpg');
        $media19->setAlt('Samsung Galaxy A70 A705M ');
        $manager->persist($media19);

        $media20 = new Media();
        $media20->setPath('/uploads/SamsungA40.jpg');
        $media20->setAlt('Samsung A40 Mobile Phone – Black');
        $manager->persist($media20);

        $media21 = new Media();
        $media21->setPath('/uploads/SamsungGalaxyA10s.jpg');
        $media21->setAlt('Samsung Galaxy A10s');
        $manager->persist($media21);

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
        $this->addReference('media9', $media9);
        $this->addReference('media10', $media10);
        $this->addReference('media11', $media11);
        $this->addReference('media12', $media12);
        $this->addReference('media13', $media13);
        $this->addReference('media14', $media14);
        $this->addReference('media15', $media15);
        $this->addReference('media16', $media16);
        $this->addReference('media17', $media17);
        $this->addReference('media18', $media18);
        $this->addReference('media19', $media19);
        $this->addReference('media20', $media20);
        $this->addReference('media21', $media21);
//        Fixture de la table Media -Fin-

//        Fixture de la table Categories -Debut-
        $category1 = new Categories();
        $category1->setNom('Computers');
        $category1->setImage($this->getReference('media1'));
        $manager->persist($category1);

        $category2 = new Categories();
        $category2->setNom('Printers');
        $category2->setImage($this->getReference('media13'));
        $manager->persist($category2);

        $category3 = new Categories();
        $category3->setNom('Phones');
        $category3->setImage($this->getReference('media19'));
        $manager->persist($category3);

        $this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);
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
        $product3->setName('MacOs');
        $product3->setDescription('  AMD Radeon Pro
                                                •	2.3GHz 8-core 9th-generation Intel Core i9 processor
                                                •	Turbo Boost up to 4.8GHz
                                                •	AMD Radeon Pro 5500M with 4GB of GDDR6 memory
                                                •	16GB of 2666MHz DDR4 memory
                                                •	1TB of SSD storage¹
                                                •	16-inch Retina display with True Tone
                                                •	Magic Keyboard
                                                •	Touch Bar and Touch ID
                                                •	Four Thunderbolt 3 ports');
        $product3->setPrice('800000');
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

        $product7 = new Products();
        $product7->setName('HP Pavillon');
        $product7->setDescription('corei5 2.0Ghz, HDD 250Go, Ram 3Go');
        $product7->setPrice('257000');
        $product7->setAvailable('1');
        $product7->setCategory($this->getReference('category1'));
        $product7->setImage($this->getReference('media2'));
        $product7->setTva($this->getReference('tva1'));
        $manager->persist($product7);

        $product8 = new Products();
        $product8->setName('Toshiba Express');
        $product8->setDescription('corei5 1.60Ghz, HDD 600Go, Ram 6Go');
        $product8->setPrice('300000');
        $product8->setAvailable('1');
        $product8->setCategory($this->getReference('category1'));
        $product8->setImage($this->getReference('media3'));
        $product8->setTva($this->getReference('tva1'));
        $manager->persist($product8);


        $product9 = new Products();
        $product9->setName('Acer Swift');
        $product9->setDescription('corei7 3.0Ghz, HDD 1To, Ram 8Go');
        $product9->setPrice('700000');
        $product9->setAvailable('1');
        $product9->setCategory($this->getReference('category1'));
        $product9->setImage($this->getReference('media9'));
        $product9->setTva($this->getReference('tva2'));
        $manager->persist($product9);

        //        Printers
        $product10 = new Products();
        $product10->setName('laser Brother MFC-L375');
        $product10->setDescription(' Adaptée aux professionnels comme aux particuliers, 
                                                l\'imprimante laser offre une impression rapide et 
                                                économique. Les imprimantes laser sont 5 fois plus 
                                                rapides que celles à technologie jets d\'encre. 
                                                Elles sont en outre souvent multifonctions (scanner, 
                                                mais surtout photocopieuse). Leur avantage principal ? 
                                                Elles sont plus fiables et coûtent bien moins cher sur 
                                                le long terme : en effet, au lieu d\'utiliser des cartouches 
                                                d\'encre liquide, elles contiennent des toners, c\'est-à-dire 
                                                des grandes cartouches d\'encre en poudre. Ces toners ne sèchent 
                                                pas contrairement à leurs homologues liquides, et ne demandent pas 
                                                d\'entretien. Leur capacité est bien supérieure, ce qui permet d\'
                                                imprimer un très grand nombre de pages avant d\'avoir besoin de le 
                                                remplacer');
        $product10->setPrice('1200000');
        $product10->setAvailable('1');
        $product10->setCategory($this->getReference('category2'));
        $product10->setImage($this->getReference('media10'));
        $product10->setTva($this->getReference('tva2'));
        $manager->persist($product10);

        $product11 = new Products();
        $product11->setName('Canon Pixma MG 2555S');
        $product11->setDescription('Il s\'agit d\'une imprimante à jet d\'encre 
                                               couleur, capable d\'imprimer 8 pages par minute 
                                               en noir et blanc et qui gère l\'impression 
                                                recto-verso en mode manuel. Si vous désirez un 
                                                modèle qui va droit au but et se concentre 
                                                sur l\'impression de vos documents du quotidien, 
                                                la Canon Pixma MG 2555S convient parfaitement.
                                                De son côté, la Canon Pixma TR4550 est une imprimante 
                                                à jet d\'encre qui dispose également de fonctions scanner, 
                                                imprimante et fax. Elle est vendue au prix de 800000 FCFA, 
                                                ce qui représente 25% de réduction. Elle se connecte à Internet 
                                                par le biais d\'une connexion WiFi, qui sert également à réaliser 
                                                des impressions et des numérisations sans fil depuis et vers un 
                                                ordinateur, une tablette ou encore un smartphone. Elle imprime en 
                                                couleur et dispose d\'une cadence de 4,4 pages par minute en couleurs, 
                                                et de 8,8 pages par minute en noir et blanc.  Elle peut numériser des 
                                                pages au format A4 au maximum et permet de les imprimer ou de les envoyer 
                                                par fax ou par email dans la foulée. C\'est un modèle complet, proposé à 
                                                un tarif attractif à la Fnac.');
        $product11->setPrice('800000');
        $product11->setAvailable('1');
        $product11->setCategory($this->getReference('category2'));
        $product11->setImage($this->getReference('media11'));
        $product11->setTva($this->getReference('tva2'));
        $manager->persist($product11);

        $product12 = new Products();
        $product12->setName('i-SENSYS LBP710Cx');
        $product12->setDescription('Périphérique haute capacité à faible encombrement, 
                                                produisant des impressions d\'une qualité exceptionnelle 
                                                en mode Couleurs vives et prenant en charge une large gamme 
                                                de supports papier, du format A6 aux bannières.');
        $product12->setPrice('500000');
        $product12->setAvailable('1');
        $product12->setCategory($this->getReference('category2'));
        $product12->setImage($this->getReference('media12'));
        $product12->setTva($this->getReference('tva2'));
        $manager->persist($product12);

        $product13 = new Products();
        $product13->setName('Epson Expression XP-4100');
        $product13->setDescription('L’imprimante Epson XP-4100 dispose d’un écran
                                               LCD de 6,1 cm et d’une capacité de 100 feuilles 
                                               dans son bac à papier. Elle utilise la technologie 
                                               Jet d’encre pour ses impressions, dont la vitesse d’
                                               impression de papier couleurs est de 5 pages/min. 
                                               Grâce à sa connexion au Wi-Fi, elle permet d’imprimer 
                                               de n’importe quelle pièce de la maison et on peut même 
                                               imprimer directement depuis son smartphone grâce à la 
                                               fonctionnalité Wi-Fi Direct. La XP-4100 permet également 
                                               de partager des documents numérisés avec la fonction Scan-to-Cloud 
                                               et de réduire la consommation de papier grâce à l’impression recto verso.');
        $product13->setPrice('600000');
        $product13->setAvailable('1');
        $product13->setCategory($this->getReference('category2'));
        $product13->setImage($this->getReference('media13'));
        $product13->setTva($this->getReference('tva1'));
        $manager->persist($product13);

        $product14 = new Products();
        $product14->setName('LaserJet Pro MFP');
        $product14->setDescription(' •	Imprimez des documents professionnels clairs, 
                                                    et profitez en plus des fonctions de numérisation, copie et télécopie
                                                •	Vitesses d’impression élevées : 38 ppm (monochrome), 28 ppm (couleur)4
                                                •	Numérisation jusqu\'à 29 ppm (noir), jusqu\'à 20 ppm (couleur)6
                                                •	Options d\'impression mobile et Ethernet ; plus numérisation vers 
                                                    USB, Microsoft SharePoint® et vers un ordinateur via un logiciel');
        $product14->setPrice('1300000');
        $product14->setAvailable('1');
        $product14->setCategory($this->getReference('category2'));
        $product14->setImage($this->getReference('media14'));
        $product14->setTva($this->getReference('tva2'));
        $manager->persist($product14);

        $product15 = new Products();
        $product15->setName('HP DeskJet 2620');
        $product15->setDescription('Elle compatible avec de multiples formats d’impression:
                                               ANSI A (Lettre), A4, B5 , A6 , etc. L’imprimante est 
                                               livrée avec deux cartouches d’encre : une cartouche de 
                                               démarrage noire authentique HP 304 et une cartouche trois couleurs 
                                               authentique HP 304. La Deskjet 2620 est peu encombrante, facile à 
                                               configurer depuis un smartphone et remplit pleinement vos besoins 
                                               d’impression quotidiens. Elle est disponible au prix de 62 € sur Cdiscount.
                                                •	Résolution maximale : 4800 x 1200 ppp
                                                •	Vitesse d’impression : 7,5 ppm (monochrome), 5,5 ppm (couleur)
                                                •	Capacité du bac : 60 feuilles
                                                •	Nombre de cartouches : 2
                                                •	Impression couleur : oui
                                                •	Interface  : USB, Wi-Fi
                                                •	Poids : 3,42 kg');
        $product15->setPrice('350000');
        $product15->setAvailable('1');
        $product15->setCategory($this->getReference('category2'));
        $product15->setImage($this->getReference('media15'));
        $product15->setTva($this->getReference('tva1'));
        $manager->persist($product15);

//        Phones
        $product16 = new Products();
        $product16->setName('itel A46 (Fiery Red');
        $product16->setDescription('•	8+0.3MP dual rear camera | 5MP front camera
                                               •	5.45-inch (13.8 centimeters) TFT IPS multi-touch capacitive touchscreen with 1440 x 720 pixels resolution, 295 ppi pixel density and 16.7M color support
                                               •	Memory, Storage & SIM: 2GB RAM | 16GB internal memory expandable up to 128GB | Dual SIM (micro+nano) dual-standby (4G+4G)
                                               •	Android v9 Pie operating system with 1.6GHz Speadtrum octa core processor
                                               •	2400mAH lithium-ion battery
                                               •	1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
                                               •	Box also includes: Battery, charger, handsfree, user manual and warranty card');
        $product16->setPrice('70000');
        $product16->setAvailable('1');
        $product16->setCategory($this->getReference('category3'));
        $product16->setImage($this->getReference('media16'));
        $product16->setTva($this->getReference('tva1'));
        $manager->persist($product16);


        $product17 = new Products();
        $product17->setName('itel A25 Pro');
        $product17->setDescription('• Brand Warranty
                                               • Dual SIM (Micro-SIM, dual stand-by)
                                               • IPS LCD capacitive touchscreen, 16M colors
                                               • Size 5.0 inches, 68.9 cm2 (~69.2% screen-to-body ratio)
                                               • Android 9.0 (Pie, Go Edition)
                                               • RAM (Memory) 2 GB
                                               • Storage Capacity 32 GB
                                               • Non-removable Li-Ion 3020 mAh battery
                                               • Brand itel');
        $product17->setPrice('90000');
        $product17->setAvailable('1');
        $product17->setCategory($this->getReference('category3'));
        $product17->setImage($this->getReference('media17'));
        $product17->setTva($this->getReference('tva1'));
        $manager->persist($product17);

        $product18 = new Products();
        $product18->setName('Itel it2171 1.8 (Dark Blue)');
        $product18->setDescription('32 MB RAM | 32 MB ROM | Expandable Upto 32 GB 4.57 cm (1.8 inch) 
                                               Quarter QVGA Display 0.3MP Rear Camera 1000 mAh Battery');
        $product18->setPrice('18000');
        $product18->setAvailable('1');
        $product18->setCategory($this->getReference('category3'));
        $product18->setImage($this->getReference('media18'));
        $product18->setTva($this->getReference('tva1'));
        $manager->persist($product18);

        $product19 = new Products();
        $product19->setName('Samsung Galaxy A70 A705M');
        $product19->setDescription('Style de Téléphone	Bar
                                               Système d\'Exploitation	Android
                                               Réseau	GSM
                                               Caractéristiques du produit	Bluetooth
                                               Condition	Nouveau
                                               Génération cellulaire	4G
                                               Mémoire intégrée	128 GB
                                               Méthode d\'entrée	Écran tactile
                                               Réseau cellulaire pris en charge.	GSM 1900
                                               Type de Téléphone Portable	Débloqué
                                                
                                               Dimensions	3.02 In. X 6.47 In. X 0.32 In.
                                               Warranty	30 day Limited Distributor
                                               Model Number	SM-A705M
                                               Country of Origin	China');
        $product19->setPrice('100000');
        $product19->setAvailable('1');
        $product19->setCategory($this->getReference('category3'));
        $product19->setImage($this->getReference('media19'));
        $product19->setTva($this->getReference('tva2'));
        $manager->persist($product19);

        $product20 = new Products();
        $product20->setName('Samsung A40 Phone – Black');
        $product20->setDescription(' •	Network provider: Sim free.
                                                •	2G, 3G and 4G network capability.
                                                •	Dual SIM card phone: supports 2 SIM cards simultaneously.
                                                •	SIM card type: nano SIM and nano SIM.
                                                •	5.9 inch Super AMOLED display.
                                                •	With a density of 438 pixels per inch.
                                                •	Touch screen.
                                                •	Toughened glass.
                                                •	Size H144.4, W69.2, D7.9mm.
                                                •	Weight 162g.
                                                •	Dual camera.
                                                •	Front camera 25MP.
                                                •	Rear camera 16MP.
                                                •	Second rear camera 5MP.
                                                •	LED.
                                                •	Camera features: Auto, Beauty, Food, Hyperlapse, Live Focus, Panorama, Pro, Scene Mode.
                                                •	Video capture in 1080p HD quality.
                                                •	ternal memory 64GB.
                                                •	Expandable memory up to 512GB when using microSD card slot. Boost your storage to hold more tunes, holiday snaps and extra apps.
                                                •	.8GHz octa core Samsung Exynos processor.
                                                •	4GB RAM.
                                                •	Operating system: Android PIE 9.
                                                •	Up to 23 hours standby time.
                                                •	Up to 1020 minutes talk time.
                                                •	3100mAh battery capacity.
                                                •	Wi-Fi.
                                                •	Bluetooth.
                                                •	NFC.
                                                •	GPS.');
        $product20->setPrice('80000');
        $product20->setAvailable('1');
        $product20->setCategory($this->getReference('category3'));
        $product20->setImage($this->getReference('media20'));
        $product20->setTva($this->getReference('tva2'));
        $manager->persist($product20);

        $product21 = new Products();
        $product21->setName('Samsung Galaxy A10s');
        $product21->setDescription(' •	Processor: Mediatek MT6762 Helio P22 (12 nm)
                                                •	RAM: 2 GB
                                                •	Storage: 32 GB
                                                •	Display: 6.2 inches, 95.9 cm2 (~80.7% screen-to-body ratio)
                                                •	Camera: 13 MP (wide), AF + 2 MP depth sensor
                                                •	Battery: 4000 mAh, Li-Ion');
        $product21->setPrice('80000');
        $product21->setAvailable('1');
        $product21->setCategory($this->getReference('category3'));
        $product21->setImage($this->getReference('media21'));
        $product21->setTva($this->getReference('tva2'));
        $manager->persist($product21);
//        Fixture de la table Products -Fin-

////        Fixture de la table Commande -Debut-
//        $commande1 = new Commande();
//        $commande1->setValidate('1');
//        $commande1->setDate(new \DateTime());
//        $commande1->setReference('1');
//        $commande1->setProducts(array('0' => array('1' => '2'),
//                                      '1' => array('2' => '1'),
//                                      '2' => array('4' => '3')
//                                ));
//        $commande1->setUsers($this->getReference('user1'));
//        $manager->persist($commande1);
//
//        $commande2 = new Commande();
//        $commande2->setValidate('1');
//        $commande2->setDate(new \DateTime());
//        $commande2->setReference('2');
//        $commande2->setProducts(array('0' => array('1' => '2'),
//                                      '1' => array('2' => '1'),
//                                      '2' => array('4' => '3')
//                                ));
//        $commande2->setUsers($this->getReference('user3'));
//        $manager->persist($commande2);


        $manager->flush();
    }

}