<?php
/**
 * Photo fixtures
 */

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * class PhotoFixtures
 */

class PhotoFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(20, 'photos', function ($i) {
            $photo = new Photo();
            $photo->setTitle($this->faker->word);
            $photo->setText($this->faker->sentence);
            $photo->setPhoto($this->faker->sentence);
            $photo->setPublic($this->faker->numberBetween(0, 1));
            $photo->setCategory($this->getRandomReference('categories'));


            $photo->setAuthor($this->getRandomReference('users'));


            return $photo;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [CategoryFixtures::class, UserFixtures::class];
    }


}

