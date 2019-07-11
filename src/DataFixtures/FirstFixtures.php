<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Tag;
use App\Entity\Product;
use function Sodium\add;

class FirstFixtures extends Fixture
{
    public const CATEGORIES = 'test';
    public const  TAGS = 'test';

    public function load(ObjectManager $manager)
    {
        $listCat = array();
        $listTag = array();
        $categoryName = ['alimentaire', 'informatique', 'bricolage', 'sport', 'culture'];
        for ($i = 0; $i < sizeOf($categoryName); $i++) {
            $category = new Category();
            $category->setLibelle($categoryName[$i]);
            $manager->persist($category);
            $listCat[$i] = $category;
        }

        $tagName = ['fruit', 'legumes', 'acide', 'sucre','condiments', 'audio', 'video', 'pc', 'tablette', 'ram', 'processeur',
            'jardin', 'piscine', 'cheminee', 'quincaillerie', 'quotidiens', 'luxe', 'jeux video', 'actualite',
            'escalade', 'karma', 'philosophie', 'ricard', 'apero', 'fin du monde', 'troll', 'tout', 'rien'];
        for ($i = 0; $i < sizeOf($tagName); $i++) {
            $tag = new Tag();
            $tag->setLibelle($tagName[$i]);
            $manager->persist($tag);
            $listTag[$i] = $tag;
        }

        $manager->flush();
        $this->addReference(self::CATEGORIES, $listCat);
        $this->addReference(self::TAGS, $listTag);
    }
}
