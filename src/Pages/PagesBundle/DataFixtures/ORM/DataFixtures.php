<?php

namespace Pages\PagesBundle\DataFixtures\ORM;

use Pages\PagesBundle\Entity\Pages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $page1 = new Pages();
        $page1->setTitle('CGV');
        $page1->setContent('
                  <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                  </div>
                   <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                   </div>
                   <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                   </div>');
        $manager->persist($page);

        
        $page2 = new Pages();
        $page2->setTitle('Mentions legales');
        $page2->setContent('
                  <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                  </div>
                   <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                   </div>
                   <div class="row">
                       <h4>Item brand and Category</h4>
                       <h5>AB29837 Item Model</h5>
                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis corrupti non quibusdam expedita. Consectetur atque voluptate deleniti ratione odit sed, ullam consequatur laboriosam, repellendus dolor laudantium pariatur. Unde, beatae.</p>
                   </div>');
        $manager->persist($page2);

        $manager->flush();
    }
}