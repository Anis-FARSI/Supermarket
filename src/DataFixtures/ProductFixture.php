<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixture extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('en_EN');

        for ($i = 0; $i < 15; $i++) {
            $product = new Product();
            $product->setTitle($faker->word());
            $product->setImg($faker->imageUrl(640, 480, 'market', true));
            $product->setPrice($faker->numberBetween(0, 100));
            $product->setDescription($faker->paragraph());
            $product->setQuantity(mt_rand(0, 50));
            $manager->persist($product);
            $manager->flush();
        }
    }
}
