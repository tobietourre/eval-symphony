<?php

namespace App\DataFixtures;

use App\Controller\ProductController;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Tag;
use App\Entity\Product;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return array(
            FirstFixtures::class,
        );
    }

    public function load(ObjectManager $manager)
    {

        $productName = ['bonbon', 'kiwi', 'pomme', 'poire', 'asus gamer_XZERTY'];
        for ($i = 0; $i < sizeOf($productName); $i++) {
            $product = new Product();
            $product->setLibelle($productName[$i]);
            $product->setPrix(mt_rand(10, 100));
            switch ($i) {
                case 0 :
                    $product->setCategory($this->getReference(FirstFixtures::CATEGORIES[0]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[2]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[3]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[25]));
                    break;
                case 1 :
                case 2 :
                case 3 :
                   $product->setCategory($this->getReference(FirstFixtures::CATEGORIES[0]));
                   $product->addTag($this->getReference(FirstFixtures::TAGS[0]));
                   $product->addTag($this->getReference(FirstFixtures::TAGS[2]));
                   $product->addTag($this->getReference(FirstFixtures::TAGS[3]));
                   $product->addTag($this->getReference(FirstFixtures::TAGS[25]));
                    break;
                case 4 :
                    $product->setCategory($this->getReference(FirstFixtures::CATEGORIES[1]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[7]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[14]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[16]));
                    $product->addTag($this->getReference(FirstFixtures::TAGS[25]));
                    break;
            }
            $manager->persist($product);
        }
        $manager->flush();
    }
}
