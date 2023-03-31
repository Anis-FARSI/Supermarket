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

        for ($i = 0; $i < 3; $i++) {
            $product = new Product();
            $product->setTitle($faker->word());
            $product->setImg('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWx3o98vALNiG-Kis2ni4UL7pnxPvHlbqoUtrDutDjP5UvEZRCsiHQu-andphmFJ7PDBo&usqp=CAU');
            $product->setPrice($faker->numberBetween(0, 100));
            $product->setDescription($faker->paragraph());
            $product->setQuantity(mt_rand(0, 50));
            $manager->persist($product);
            $manager->flush();
        }
    }
}
