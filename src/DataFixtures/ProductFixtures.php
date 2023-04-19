<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product1 = new Product();
       // $product1->setImage('https://www.foodette.fr/wp-content/uploads/2017/08/apple-417924_1920-compressor-1024x656.jpg');
        $product1->setPrice(10.99);
        $product1->setTitle('Produit 1');
        $product1->setDescription('Ceci est le produit 1');
        $product1->setQuantity(10);
        $manager->persist($product1);

        $product2 = new Product();
       //  $product2->setImage('https://www.foodette.fr/wp-content/uploads/2017/08/apple-417924_1920-compressor-1024x656.jpg');
        $product2->setPrice(20.99);
        $product2->setTitle('Produit 2');
        $product2->setDescription('Ceci est le produit 2');
        $product2->setQuantity(5);
        $manager->persist($product2);

        $manager->flush();
    }
}
