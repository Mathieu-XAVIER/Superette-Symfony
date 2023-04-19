<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nomProduitsRandom = [
             'Pomme',
            'Poire',
            'Banane',
            'Orange',
            'Fraise',
            'Mangue',
            'Kiwi',
            'Pêche',
            'Melon',
            'Abricot',
];




 for($i = 3; $i <= 10; $i++) {
$product = new Product();

 $product->setPrice(mt_rand(10, 100));

$product->setTitle($nomProduitsRandom[mt_rand(0, 9)]);

$product->setDescription('Ceci est le produit ' . $i);

$product->setQuantity(mt_rand(1, 10));

 $manager->persist($product);

}



        $manager->flush();
    }
}
